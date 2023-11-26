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

Route::get('/signup', [SignupController::class, 'index']);
Route::post('/signup', [SignupController::class, 'store']);

// Landing Page
Route::get('/', function () {    
  $latestPosts = Post::latest()->take(4)->get(['title', 'views_count', 'slug']);

  return view('landing_pages.index', [
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