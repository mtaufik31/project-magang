<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\genre;
use App\Models\Manga;
use App\Models\MangaSwiper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $blogs = Blog::latest()->paginate(4);

        $mangas = Manga::with(['chapters' => function ($query) {
            $query->latest('chapter_number')->take(3);
        }])
            ->orderBy('updated_at', 'desc')
            ->paginate(9);

        $genres = genre::paginate(6);

        $swiperMangas = MangaSwiper::with('manga')
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('welcome', array(
            'title' => 'MangaLo',
            'blogs' => $blogs,
            'mangas' => $mangas,
            'genres' => $genres,
            'swiperMangas' => $swiperMangas
        ));
    }

    public function dashboard() {
        $manyManga = Manga::all()->count();
        $manyBlog = Blog::all()->count();
        $manyGenre = genre::all()->count();
        $manyStaff = User::where('role', 'staff')->count();
        if (Auth::user()->role == 'admin' || Auth::user()->role == 'staff') {
            return view('dashboard.index', array(
                'title' => 'Dashboard | Staff',
                'manyBlogs' => $manyBlog,
                'manyStaff' => $manyStaff,
                'manyManga' => $manyManga,
                'manyGenre' => $manyGenre,

            ));
        }
        return redirect()->route('home');
    }
}
