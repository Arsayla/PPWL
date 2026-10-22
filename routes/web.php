<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/education', function () {
    return view('education');
})->name('education');

Route::get('/projects', function () {
    return view('projects');
})->name('projects');


use App\Http\Controllers\NewControllers;

Route::get('/newpost', [NewControllers::class, 'index'])
    ->name('newpost');
    