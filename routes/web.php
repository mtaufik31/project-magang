<?php


use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Middleware\Dashboard;
use App\Models\Blog;
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
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');



// Route::post('forgot-password', function (Request $request) {
//     $request->validate(['email' => 'required|email']);

//     // Mengirim link reset password
//     $status = Password::sendResetLink(
//         $request->only('email')
//     );

//     return $status === Password::RESET_LINK_SENT
//                 ? back()->with(['status' => __($status)])
//                 : back()->withErrors(['email' => __($status)]);
// })->name('password.email');

// Halaman perubahan password
Route::get('reset-password/{token}', function ($token) {
    return view('register.reset', ['token' => $token], array('title' => 'Reset'));
})->name('password.reset');


Route::post('reset-password', [AuthController::class, 'reset'])->name('password.update');
// Proses perubahan password


//  ----------------------------------------------------------------
// DASHBOARD
//  ----------------------------------------------------------------]

Route::middleware(Dashboard::class)->group(function () {
    Route::get('/dashboard', function () {
        $manyBlog = Blog::all()->count();
        if (Auth::user()->role == 'admin') {
            return view('dashboard.index', array('title' => 'Dashboard | Staff', 'manyBlogs' => $manyBlog));
        }
        return redirect()->route('home');
    })->middleware('auth')->name('dashboard');

    Route::get('BlogsList', function () {
        $blogs = Blog::all();

        return view('dashboard.blog.list', array('title' => 'Dashboard | List Blogs', 'blogs' => $blogs));
    })->name('List Blogs');

    Route::get('BlogCreate', [BlogController::class, 'create'])->name('Create blog');

    Route::delete('blog/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');

    Route::post('blog/submit', [BlogController::class, 'store'])->name('blog.submit');

    Route::get('MangaList', function () {
        return view('dashboard.manga.list', array('title' => 'Dashboard | List Manga'));
    })->name('List Manga');

    Route::get('StaffList', function () {
        return view('dashboard.staff.list', array('title' => 'Dashboard | List Staff'));
    })->name('List Staff');
});
