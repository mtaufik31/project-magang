<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/rawr', function () {
    return view('rawr');
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
