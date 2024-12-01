<?php
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\MangaSwiperController;
use App\Http\Middleware\Dashboard;
use App\Models\Blog;
use App\Models\Chapter;
use App\Models\genre;
use App\Models\User;
use App\Models\Manga;
use App\Models\MangaSwiper;

//  ----------------------------------------------------------------
// ROUTE VIEW LANDING PAGE
//  ----------------------------------------------------------------
Route::get('/', function () {
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
})->name('home');

Route::get('join', function () {
    return view('join', array('title' => 'MangaLo | Join Us'));
})->name('join');

Route::get('faq', function () {
    return view('faq', array('title' => 'MangaLo | FAQ'));
})->name('faq');

Route::get('blogs', function () {
    $blogs = Blog::all();

    return view('blogs', array('title' => 'MangaLo | Blogs', 'blogs' => $blogs));
})->name('blogs');

Route::get('blog/{id}', action: function ($id) {
    $blog = Blog::where('id', '=', $id)->get()->first();
    if (!$blog) {
        abort(404);
    }
    return view('blog', array('title' => 'MangaLo | blog', 'blog' => $blog));
})->name('blog');

Route::get('list', function () {
    $mangas = Manga::orderBy('updated_at', 'desc')->paginate(8);
    return view('list', array('title' => 'MangaLo | List', 'mangas' => $mangas));
})->name('list');

Route::get('register', function () {
    return view('register.signup',);
})->name('register');

Route::get('login', function () {
    return view('register.login',);
})->name('login');

Route::get('forgot', function () {

    return view('register.forgot', data: array('title' => 'MangaLo | Forgot'));

})->name('forgot');

Route::get('chapter', function () {
    return view('chapter', data: array('title' => 'MangaLo | Chapter'));
})->name('chapter');

Route::get('manga/{id}', function ($id) {
    $manga = Manga::with(['chapters' => function ($query) {
        $query->orderBy('chapter_number', 'desc');
    }])->find($id);

    $mangas = Manga::inRandomOrder()->take(5)->get();

    if (!$manga) {
        abort(404);
    }

    $firstChapter = Chapter::where('manga_id', $id)->orderBy('chapter_number', 'asc')->first();
    $newChapter = Chapter::where('manga_id', $id)->orderBy('chapter_number', 'desc')->first();

    return view('manga', [
        'title' => 'MangaLo | Manga',
        'manga' => $manga,
        'mangas' => $mangas,
        'firstChapter' => $firstChapter,
        'newChapter' => $newChapter,
    ]);
})->name('manga');

Route::get('/search-manga', [MangaController::class, 'search'])->name('search.manga');
Route::get('list', [MangaController::class, 'sort'])->name('list');

Route::controller(GenreController::class)->group(function () {
    Route::get('genre/search', 'search')->name('genre.search');
    Route::get('/genre/{id}', 'sortGenres')->name('genre.sort');
});

//  ----------------------------------------------------------------
// AUTHENTICATION
//  ----------------------------------------------------------------

Route::controller(Authcontroller::class)->group(function () {
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register');
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
    Route::post('forgot-password', 'forgotPassword')->name('password.email');
    Route::get('reset-password/{token}', function ($token) {
        return view('register.reset', ['token' => $token], array('title' => 'Reset'));
    })->name('password.reset');
    Route::post('reset-password',  'reset')->name('password.update');
});

//  ----------------------------------------------------------------
// DASHBOARD
//  ----------------------------------------------------------------]

Route::middleware(Dashboard::class)->group(function () {
    // Dashboard Route
    Route::get('/dashboard', function () {
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
    })->middleware('auth')->name('dashboard');
    Route::get('points', function () {
        return view('points', array('title' => 'MangaLo! | Points'));
    })->name('points');
    // Blog Routes Group
    Route::controller(BlogController::class)->group(function () {
        Route::get('BlogsList', function (Request $request) {

            // Ambil query 'search' dan 'sort' dari URL
            $search = $request->query('search');
            $sort = $request->query('sort');

            // Mulai query untuk mengambil data blog
            $blogs = Blog::query();

            // Filter berdasarkan pencarian jika ada query 'search'
            if ($search) {
                $blogs->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('created_by', 'like', '%' . $search . '%');
            }

            // Urutkan berdasarkan 'sort' jika ada query 'sort'
            if ($sort == 'terbaru') {
                $blogs->orderBy('created_at', 'desc');
            } elseif ($sort == 'terlama') {
                $blogs->orderBy('created_at', 'asc');
            } else {
                $blogs->orderBy('created_at', 'asc');
            }

            // Dapatkan hasil query
            $blogs = $blogs->get();

            return view('dashboard.blog.list', array(
                'title' => 'Dashboard | List Blogs',
                'blogs' => $blogs
            ));
        })->name('List Blogs');
        Route::get('BlogCreate', 'create')->name('Create blog');
        Route::delete('blog/delete/{id}', 'delete')->name('blog.delete');
        Route::post('blog/submit', 'store')->name('blog.submit');
        Route::put('blog/update/{id}', 'update')->name('blog.update');
    });

    Route::controller(GenreController::class)->group(function () {
        Route::get('GenreList', [GenreController::class, 'index'])->name('GenreList');
        Route::post('GenreStore', [GenreController::class, 'store'])->name('GenreStore');
        Route::get('GenreEdit/{id}', [GenreController::class, 'edit'])->name('GenreEdit');
        Route::put('GenreUpdate/{id}', [GenreController::class, 'update'])->name('GenreUpdate');
        Route::delete('GenreDelete/{id}', [GenreController::class, 'destroy'])->name('GenreDelete');
    });


    // Manga Routes Group
    Route::controller(MangaController::class)->group(function () {
        Route::get('MangaList', 'index')->name('List Manga');
        Route::get('MangaCreate', 'create')->name('Create manga');
        Route::post('MangaStore', 'store')->name('Store manga');
        Route::get('MangaEdit/{manga}', 'edit')->name('Edit manga');
        Route::put('MangaUpdate/{manga}', 'update')->name('Update manga');
        Route::delete('MangaDelete/{manga}', 'destroy')->name('Delete manga');
        Route::get('MangaDetail/{manga}', function () {
            return view('dashboard.manga.detail', data: array('title' => 'Dashboard | Manga Detail'));
        })->name('Detail Manga');
    });

    // Staff Routes Group
    Route::controller(StaffController::class)->group(function () {
        Route::get('StaffList', 'index')->name('List.Staff');
        Route::get('StaffCreate', 'showForm')->name('Staff.create');
        Route::post('staffSubmit', 'addStaff')->name('staff.submit');
        Route::delete('staffDelete/{id}', 'delete')->name('staff.delete');
    });

    Route::controller(MangaSwiperController::class)->group(function () {
        Route::get('swiper-list', 'index')->name('swiper.list');
        Route::post('swiper-submit', 'store')->name('swiper.submit');
        Route::delete('swiper-delete/{id}', 'destroy')->name('swiper.delete');
        Route::patch('swiper-toggle-active/{id}', 'toggleActive')->name('swiper.toggle');
    });

    Route::prefix('manga/{mangaId}/chapters')->group(function () {
        Route::get('/', [ChapterController::class, 'index'])->name('chapters.index');
        Route::get('/create', [ChapterController::class, 'create'])->name('chapters.create');
        Route::post('/', [ChapterController::class, 'store'])->name('chapters.store');
        Route::delete('/{id}', [ChapterController::class, 'destroy'])->name('chapters.destroy');
        Route::get('/{id}/edit', [ChapterController::class, 'edit'])->name('chapters.edit');
        Route::put('/{id}', [ChapterController::class, 'update'])->name('chapters.update');
    });
});
