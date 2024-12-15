<?php

namespace App\Http\Controllers;

use DB;
use Log;
use App\Models\genre;
use App\Models\Manga;
use App\Models\Chapter;
use App\Models\MangaPurchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MangaController extends Controller
{
    public function index()
    {
        $mangas = Manga::with('user')->latest()->get();
        return view('dashboard.manga.list', [
            'title' => 'Dashboard | List Manga',
            'mangas' => $mangas
        ]);
    }
    public function sort(Request $request)
    {
        $genres = Genre::all();
        $years = Manga::select('released_year')->distinct()->orderBy('released_year', 'desc')->pluck('released_year');
        $sort = $request->query('sort', 'latest');
        $status = $request->query('status', '');
        $query = Manga::query();

        // Filter berdasarkan genres (JSON)
        if ($request->has('genre') && $request->genre !== null) {
            $selectedGenres = $request->genre;
            $query->where(function ($q) use ($selectedGenres) {
                foreach ($selectedGenres as $genreId) {
                    $q->orWhereJsonContains('genre', $genreId);
                }
            });
        }
        // Filter berdasarkan status
        if ($status) {
            $query->where('status', $status);
        }
        // Filter berdasarkan tahun
        if ($request->has('released_year') && is_array($request->query('released_year'))) {
            $query->whereIn('released_year', $request->query('released_year'));
        }
        // Apply sorting
        switch ($sort) {
            case 'latest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'a-z':
                $query->orderBy('title', 'asc');
                break;
            case 'z-a':
                $query->orderBy('title', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'year-desc':
                $query->orderBy('released_year', 'desc');
                break;
            case 'year-asc':
                $query->orderBy('released_year', 'asc');
                break;
        }
        $mangas = $query->paginate(12);

        // Get selected years from request
        $selectedYears = $request->input('released_year', []);

        if ($request->ajax()) {
            return view('partials.manga-list', compact('mangas'))->render();
        }

        return view('list', [
            'title' => 'MangaLo | List',
            'mangas' => $mangas,
            'genres' => $genres,
            'years' => $years,
            'sort' => $sort,
            'status' => $status,
            'selectedGenres' => $request->genre ?? [],
            'selectedYears' => $selectedYears,
        ]);
    }
    public function create()
    {
        return view('dashboard.manga.create', [
            'title' => 'Dashboard | Add Manga'
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'alternative' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:ongoing,complete',
            'rating' => 'required|integer|between:1,10',
            'description' => 'required|string|min:100',
            'released_year' => 'required|date_format:Y',
            'author' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'genre' => 'required|array',
            'is_paid' => 'required|boolean',
            'unlock_cost' => 'required_if:is_paid,1|integer|min:90',
        ]);
        // Handling genres (existing or new)
        $genreIds = [];
        foreach ($request->genre as $genre) {
            if (is_numeric($genre)) {
                $genreIds[] = $genre;
            } else {
                $newGenre = Genre::create(['title' => $genre]);
                $genreIds[] = "" . $newGenre->id;
            }
        }
        // Handling image upload
        $imagePath = $request->file('image')->store('manga-covers', 'public');
        // Check if title exists and modify if needed
        $title = $validated['title'];
        $originalTitle = $title;
        $counter = 1;
        while (Manga::where('title', $title)->exists()) {
            $counter++;
            $title = $originalTitle . " {$counter}";
        }
        $manga = new Manga($validated);
        $manga->title = $title; // Use the modified title
        $manga->genre = json_encode($genreIds);
        $manga->image = $imagePath;
        $manga->created_by = Auth::id();
        $manga->is_paid = $request->is_paid; // Set apakah manga berbayar
        $manga->unlock_cost = $request->is_paid ? $request->unlock_cost : 0;
        $manga->save();
        return redirect()->route('List Manga')->with('success', 'Manga added successfully with a unique title!');
    }
    public function edit(Manga $manga)
    {
        return view('dashboard.manga.edit', [
            'title' => 'Dashboard | Edit Manga',
            'manga' => $manga
        ]);
    }

    public function update(Request $request, Manga $manga)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'alternative' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:ongoing,complete',
            'rating' => 'required|integer|between:1,10',
            'description' => 'required|string|min:100',
            'released_year' => 'required|date_format:Y',
            'author' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'genre' => ' required|array',
            'is_paid' => 'required|boolean',
            'unlock_cost' => 'nullable|integer|min:90|required_if:is_paid,1',
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('manga-covers', 'public');
            $validated['image'] = $imagePath;
        }
        $genreIds = [];
        foreach ($request->genre as $genre) {
            if (is_numeric($genre)) {
                $genreIds[] = $genre;
            } else {
                $newgenre = genre::create(['title' => $genre]);
                $genreIds[] = "" . $newgenre->id;
            }
        }
        $validated["genre"] = json_encode($genreIds);
        // dd($manga->genre);
        $manga->update(array_merge($validated, [
            'genre' => json_encode($genreIds),
            'unlock_cost' => $request->is_paid ? $request->unlock_cost : 0, // Set unlock_cost ke 0 jika gratis
        ]));
        // $manga->save();
        return redirect()->route('List Manga')->with('success', 'Manga updated successfully');
    }

    public function destroy(Manga $manga)
    {
        $manga->delete();
        return redirect()->route('List Manga')->with('success', 'Manga deleted successfully');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Query for matching manga based on title, author, description, or other fields.
        $mangas = Manga::where('title', 'like', "%{$keyword}%")
            ->orWhere('alternative', 'like', "%{$keyword}%")
            ->orWhere('description', 'like', "%{$keyword}%")
            ->orWhere('author', 'like', "%{$keyword}%")
            ->get();

        return view('search', ['title' => 'MangaLo!
    | What U wanna See'], compact('mangas', 'keyword'));
    }

    public function view(Request $request, $id)
    {
        $manga = Manga::find($id);

        if (!$manga) {
            abort(404);
        }

        $isUnlocked = false;
        if (Auth::check()) {
            $isUnlocked = MangaPurchase::where('user_id', Auth::id())
                ->where('manga_id', $manga->id)
                ->exists();
        }

        // Jika request AJAX, return JSON data chapters
        if ($request->ajax()) {
            $query = $request->input('query');
            $sort = $request->input('sort', 'desc');

            // Query untuk mencari chapter berdasarkan nomor chapter
            $chapters = Chapter::where('manga_id', $id)
                ->when($query, function ($queryBuilder) use ($query) {
                    // Konversi chapter_number ke string untuk perbandingan LIKE
                    return $queryBuilder->whereRaw('CAST(chapter_number AS CHAR) LIKE ?', ['%' . $query . '%']);
                })
                ->orderBy('chapter_number', $sort)
                ->get()
                ->map(function ($chapter) {
                    return [
                        'id' => $chapter->id,
                        'number' => $chapter->chapter_number,
                        'title' => $chapter->chapter_title ?? 'Chapter ' . $chapter->chapter_number,
                        'cover' => asset('storage/' . $chapter->cover_image),
                        'date' => $chapter->updated_at->setTimezone('Asia/Jakarta')->format('F d, Y'),
                        'url' => route('chapter', ['id' => $chapter->id])
                    ];
                });

            return response()->json([
                'success' => true,
                'manga_id' => $id,
                'data' => $chapters
            ]);
        }

        // Proses biasa jika bukan AJAX
        $chapters = Chapter::where('manga_id', $id)
            ->orderBy('chapter_number', 'desc')
            ->get();
        $mangas = Manga::inRandomOrder()->take(5)->get();
        $firstChapter = $chapters->last();
        $newChapter = $chapters->first();

        return view('manga', [
            'title' => 'MangaLo | Manga',
            'manga' => $manga,
            'mangas' => $mangas,
            'chapters' => $chapters,
            'firstChapter' => $firstChapter,
            'newChapter' => $newChapter,
            'isUnlocked' => $isUnlocked,
        ]);
    }

    // public function unlock(Request $request, $id)
    // {
    //     $manga = Manga::findOrFail($id);
    //     $user = auth()->user();

    //     // Pastikan manga berbayar
    //     if (!$manga->is_paid) {
    //         return redirect()->back()->with('error', 'This manga is free and doesn’t need to be unlocked.');
    //     }

    //     // Cek apakah pengguna sudah memiliki manga ini
    //     $isUnlocked = MangaPurchase::where('user_id', $user->id)
    //         ->where('manga_id', $manga->id)
    //         ->exists();

    //     if ($isUnlocked) {
    //         return redirect()->back()->with('success', 'You already unlocked this manga.');
    //     }

    //     if ($user->coins < $manga->unlock_cost) {
    //         return redirect()->back()->with('error', 'You do not have enough coins to unlock this manga.');
    //     }

    //     // Kurangi koin pengguna
    //     $user->coins -= $manga->unlock_cost;
    //     $user->save();

    //     // Simpan data unlock
    //     MangaPurchase::create([
    //         'user_id' => $user->id,
    //         'manga_id' => $manga->id,
    //     ]);

    //     return redirect()->back()->with('success', 'Manga unlocked successfully!');
    // }
}
