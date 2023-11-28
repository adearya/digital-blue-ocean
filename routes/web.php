<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/signup', [SignupController::class, 'index']);
Route::post('/signup', [SignupController::class, 'store']);

Route::get('/manage-deposits', function () {
    return view('posts.manage-deposits');
});
Route::get('/manage-deposits/edit-item-submission-center', function () {
  return view('posts.edit-item-submission-center');
});

// Landing Page
Route::get('/', function () {    
  $latestPosts = Post::latest()->take(4)->get(['title', 'views_count', 'slug']);

  return view('landing_page.index', [
    'posts' => $latestPosts,
  ]);
  })->name('landing_page');

// Dashboard
Route::get('/posts', [PostController::class, 'index'])->name('dashboard');

// Detail Page
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('detail');

// Posts by Category
Route::get('/category/{category:slug}', [CategoryController::class, 'index'])->name('single_category');

// Posts by Author
Route::get('/author/{author:username}', [AuthorController::class, 'index'])->name('posts_auhtor');

// Categories
// Route::get('/categories', [CategoryController::class, 'index'])->name('all_categories');