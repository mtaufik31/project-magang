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

        return view('genre', [
            'title' => 'Dashboard | List Manga',
            'mangas' => $mangas,
            'genre' => $genre
        ]);
    }
}
