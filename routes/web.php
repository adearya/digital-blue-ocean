<?php

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/signup', [SignupController::class, 'index']);
Route::post('/signup', [SignupController::class, 'store']);

// Landing Pages
Route::get('/', function () {    
    $latestPosts = Post::latest()->take(4)->get(['title', 'views_count', 'slug']);

    return view('landing_pages.index', [
        'posts' => $latestPosts,
    ]);
    })->name('index');

// Get Posts
Route::get('/posts', [PostController::class, 'index'])->name('all_posts')->middleware('auth');

// Get Post
Route::get('/post/{slug}', [PostController::class, 'show'])->name('single_post');

// Categories
// Route::get('/categories', [CategoryController::class, 'index'])->name('all_categories');

// Posts by Category
Route::get('/category/{category:slug}', [CategoryController::class, 'index'])->name('single_category');

// Posts by Author
Route::get('/author/{author:username}', [AuthorController::class, 'index'])->name('posts_auhtor');