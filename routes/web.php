<?php

use App\Http\Controllers\CollectionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing_page');
})->name('home');

Route::get('/home', function () {
    return view('home');
});

Route::get('/search_collections', [CollectionsController::class, 'index'])->name('landing_page');

Route::get('/search_collections/{slug}', [CollectionsController::class, 'show']);

Route::get('/statistics', function () {
    return view('statistics');
});

Route::get('/related_links', function () {
    return view('related_links');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});