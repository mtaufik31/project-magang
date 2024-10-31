<?php

namespace App\Http\Controllers;

use App\Models\genre;
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

    
}
