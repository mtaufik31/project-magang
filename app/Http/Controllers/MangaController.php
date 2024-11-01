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

    public function create()
    {
        return view('dashboard.manga.create', [
            'title' => 'Dashboard | Add Manga'
        ]);

    }

    public function store(Request $request)
    {

        $validated = $request->validate(rules: [
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

        $genreIds = [];


        foreach ($request->genre as $genre) {
            if (is_numeric($genre)) {
                $genreIds[] = $genre;
            } else {
                $newgenre = genre::create(['title' => $genre]);
                $genreIds[] = "".$newgenre->id;
            }
        }

        // dd('wow');

        $imagePath = $request->file('image')->store('manga-covers', 'public');

        $manga = new Manga($validated);
        $manga->genre = json_encode($genreIds);
        $manga->image = $imagePath;
        $manga->created_by = Auth::id();
        $manga->save();

        return redirect()->route('List Manga')->with('success', 'Manga added successfully');
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

        $manga->update($validated);
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

    return view('search',['title' => 'MangaLo!
    | What U wanna See'], compact('mangas', 'keyword'));
}
}

