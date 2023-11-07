<?php

use App\Models\Categories;
use App\Http\Controllers\CollectionsController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;

// Landing Pages
Route::get('/', function () {
    return view('landing_pages.index');
    })->name('index');

// Get Collections
Route::get('/get_collections', [CollectionsController::class, 'index'])->name('get_collections');

// Get Collection
Route::get('/get_collection/{slug}', [CollectionsController::class, 'show'])->name('get_collection');

// Categories
Route::get('/categories', [CategoriesController::class, 'index'])->name('get_categories');

// Get Category
Route::get('/categories/{category:slug}', [CategoriesController::class, 'show'])->name('get_category');