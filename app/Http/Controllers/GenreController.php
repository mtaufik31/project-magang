<?php

namespace App\Http\Controllers;

use App\Models\genre;
use App\Models\Manga;
use Illuminate\Http\Request;


class GenreController extends Controller
{
    public function search(Request $request)
    {
        $term = $request->get('q');

        $genres = genre::where('title', 'LIKE', "%$term%")
            ->select('id', 'title as text')
            ->get();

        return response()->json($genres);
    }

    public function sortGenres($id)
    {
        $genre = genre::where('id', 'LIKE', "%$id%")->first();
        // Query for matching manga based on title, author, description, or other fields.
        $mangas = Manga::whereJsonContains('genre', $id)->get();

        if (!$genre) {
            abort(404);
        }

        return view('genre', [
            'title' => 'Dashboard | List Manga',
            'mangas' => $mangas,
            'genre' => $genre
        ]);
    }

    public function index()
    {
        $genres = Genre::all();
        return view('dashboard.genre.list', [
            'title' => 'Dashboard | Genre List',
            'genres' => $genres,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Genre::create([
            'title' => $request->title,
        ]);

        return redirect()->route('GenreList')->with('success', 'Genre created successfully.');
    }

    public function edit($id)
    {
        $genre = Genre::findOrFail($id);
        return view('dashboard.genre.edit', compact('genre'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $genre = Genre::findOrFail($id);
        $genre->update([
            'title' => $request->title,
        ]);

        return redirect()->route('GenreList')->with('success', 'Genre updated successfully.');
    }

    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return redirect()->route('GenreList')->with('success', 'Genre deleted successfully.');
    }
}
