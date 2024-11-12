<?php

namespace App\Http\Controllers;

use App\Models\genre;
use App\Models\Manga;
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
        $sort = $request->query('sort', 'latest'); // Default sort is latest
        $query = Manga::query();

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
            case 'populer':
                $query->orderBy('views', 'desc');
                break;
        }

        $mangas = $query->get();

        if ($request->ajax()) {
            return view('partials.manga-list', compact('mangas'))->render();
        }

        return view('list', [
            'title' => 'MangaLo | List',
            'mangas' => $mangas,
            'sort' => $sort
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
            'description' => 'nullable|string',
            'released_year' => 'required|date_format:Y',
            'author' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'genre' => 'required|array'
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

        // Create and save the Manga with the unique title
        $manga = new Manga($validated);
        $manga->title = $title; // Use the modified title
        $manga->genre = json_encode($genreIds);
        $manga->image = $imagePath;
        $manga->created_by = Auth::id();
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
            'description' => 'nullable|string',
            'released_year' => 'required|date_format:Y',
            'author' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'genre' => ' required|array'
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


        $manga->update($validated);
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
}
