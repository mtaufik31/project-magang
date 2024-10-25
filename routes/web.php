<?php


use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\StaffController;
use App\Http\Middleware\Dashboard;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


//  ----------------------------------------------------------------
// ROUTE VIEW
//  ----------------------------------------------------------------
Route::get('/', function () {

    $blogs = Blog::all();
    return view('welcome', array('title' => 'MangaLo', 'blogs' => $blogs));
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

    return view('blog', array('title' => 'MangaLo | blog', 'blog' => $blog));
})->name('blog');

Route::get('list', function () {
    return view('list', array('title' => 'MangaLo | List'));
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

Route::get('/manga', function () {
    return view('manga', ['title' => 'MangaLo | Manga']);
})->middleware('auth')->name('manga');


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
        $manyBlog = Blog::all()->count();
        $manyStaff = User::where('role', 'staff')->count();
        if (Auth::user()->role == 'admin' || Auth::user()->role == 'staff') {
            return view('dashboard.index', array(
                'title' => 'Dashboard | Staff',
                'manyBlogs' => $manyBlog,
                'manyStaff' => $manyStaff,
            ));
        }
        return redirect()->route('home');
    })->middleware('auth')->name('dashboard');

    // Blog Routes Group
    Route::controller(BlogController::class)->group(function () {
        Route::get('BlogsList', function () {
            $blogs = Blog::all();
            return view('dashboard.blog.list', array(
                'title' => 'Dashboard | List Blogs',
                'blogs' => $blogs
            ));
        })->name('List Blogs');

        Route::get('BlogCreate', 'create')
            ->name('Create blog');

        Route::delete('blog/delete/{id}', 'delete')
            ->name('blog.delete');

        Route::post('blog/submit', 'store')
            ->name('blog.submit');

        // Add this update route for the blog edit
        Route::put('blog/update/{id}', 'update')
            ->name('blog.update');
    });


    // Manga Routes Group
    Route::get('MangaList', function () {
        return view('dashboard.manga.list', array(
            'title' => 'Dashboard | List Manga'
        ));
    })->name('List Manga');
    // Route::controller(MangaController::class)->group(function () {
    // });

    // Staff Routes Group
    Route::controller(StaffController::class)->group(function () {
        Route::get('StaffList', 'index')->name('List.Staff');

        Route::get('StaffCreate', 'showForm')->name('Staff.create');

        Route::post('staffSubmit', 'addStaff' )->name('staff.submit');

        Route::delete('staffDelete/{id}', 'delete')->name('staff.delete');
    });
});
