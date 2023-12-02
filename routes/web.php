<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Models\Post;
use App\Models\Collection;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard/review', [ReviewController::class, 'index'])->name('login');

Route::get('/dashboard/manage-deposit/item-submission-center', [PostController::class, 'createItemSubmissionCenter'])->name('item-submission-center')->middleware('auth');
Route::get('/dashboard/manage-deposit/item-keywords', [PostController::class, 'createItemKeywords'])->name('item-keywords')->middleware('auth');
Route::get('/dashboard/manage-deposit/item-deposits', [PostController::class, 'createItemKeywords'])->name('item-deposits')->middleware('auth');
Route::resource('/dashboard/manage-deposits', PostController::class)->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/signup', [SignupController::class, 'index']);
Route::post('/signup', [SignupController::class, 'store']);

// Landing Page
Route::get('/', function () {    
  $latestPosts = Collection::latest()->take(4)->get(['title', 'views_count', 'slug']);

  return view('landing_page.index', [
    'posts' => $latestPosts,
  ]);
  })->name('landing_page');

// Dashboard
Route::get('/posts', [CollectionController::class, 'index'])->name('dashboard');

// Detail Page
Route::get('/posts/{slug}', [CollectionController::class, 'show'])->name('detail');

// Posts by Category
Route::get('/category/{category:slug}', [CategoryController::class, 'index'])->name('single_category');

// Posts by Author
Route::get('/author/{author:username}', [AuthorController::class, 'index'])->name('posts_auhtor');

// Categories
// Route::get('/categories', [CategoryController::class, 'index'])->name('all_categories');