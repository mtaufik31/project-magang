<?php

use Illuminate\Support\Facades\Route;

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
    return view('register.register');
})->name('register');

Route::get('login', function () {
    return view('register.login');
})->name('login');

