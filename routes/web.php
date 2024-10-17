<?php


use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;


//  ----------------------------------------------------------------
// ROUTE VIEW
//  ----------------------------------------------------------------
Route::get('/', function () {
    return view('welcome', array('title' => 'MangaLo'));
})->name('home');

Route::get('join', function () {
    return view('join', array('title' => 'MangaLo | Join Us'));
})->name('join');

Route::get('faq', function () {
    return view('faq', array('title' => 'MangaLo | FAQ'));
})->name('faq');

Route::get('blogs', function () {
    return view('blogs', array('title' => 'MangaLo | Blogs'));
})->name('blogs');

Route::get('blog', action: function () {
    return view('blog', array('title' => 'MangaLo | blog'));
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

//  ----------------------------------------------------------------
// AUTHENTICATION
//  ----------------------------------------------------------------
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');

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

// Proses perubahan password
Route::post('reset-password', action: function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:8',
    ]);

    // Reset password
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => bcrypt($password)
            ])->save();

            // Jika ingin langsung login setelah reset
            auth()->login($user);
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->name('password.update');


//  ----------------------------------------------------------------
// DASHBOARD
//  ----------------------------------------------------------------
Route::get('/dashboard', function () {
    if (Auth::user()->role == 'admin') {
        return view('staff.dashboard', array('title' => 'Dashboard | Staff'));
    }
    return redirect()->route('home');
})->middleware('auth')->name('dashboard');

Route::get('/manga', function () {
    return view('manga', ['title' => 'MangaLo | Manga']);
})->middleware('auth')->name('manga');
