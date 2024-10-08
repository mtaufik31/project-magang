<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('join', function () {
    return view('join');
})->name('join');

Route::get('faq', function () {
    return view('faq');
})->name('faq');

Route::get('blog', function () {
    return view('blog');
})->name('blog');

Route::get('list', function () {
    return view('list');
})->name('list');

Route::get('register', function () {
    return view('register.signup');
})->name('register');

Route::get('login', function () {
    return view('register.login');
})->name('login');

// AUTHENTICATION
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


