<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Models\Post;
use App\Models\Review;
use App\Models\Collection;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard/review', [CollectionController::class, 'index']);
Route::post('/dashboard/review', [ReviewController::class, 'store']);

Route::get('/dashboard/manage-deposit/item-submission-center', [PostController::class, 'createItemSubmissionCenter'])->name('create-item-submission-center');
Route::post('/dashboard/manage-deposit/item-submission-center', [PostController::class, 'storeItemSubmissionCenter'])->name('store-item-submission-center');
Route::get('/dashboard/manage-deposit/item-keywords', [PostController::class, 'createItemKeywords'])->name('create-item-keywords');
Route::post('/dashboard/manage-deposit/item-keywords', [PostController::class, 'storeItemKeywords'])->name('store-item-keywords');
Route::get('/dashboard/manage-deposit/item-deposits', [PostController::class, 'createItemDeposits'])->name('create-item-deposits');
Route::post('/dashboard/manage-deposit/item-deposits', [PostController::class, 'storeItemDeposits'])->name('store-item-deposits');
Route::resource('/dashboard/manage-deposits', PostController::class)->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/signup', [SignupController::class, 'index']);
Route::post('/signup', [SignupController::class, 'store']);

// Landing Page
Route::get('/', function () {    
  $latestPosts = Review::latest()->take(4)->get(['title', 'views_count', 'slug']);

  return view('landing_page.index', [
    'posts' => $latestPosts,
  ]);
  })->name('landing_page');

// Dashboard
Route::get('/posts', [ReviewController::class, 'index'])->name('dashboard');

// Detail Page
Route::get('/posts/{slug}', [CollectionController::class, 'show'])->name('detail');

// Posts by Category
Route::get('/category/{category:slug}', [CategoryController::class, 'index'])->name('single_category');

// Posts by Author
Route::get('/author/{author:username}', [AuthorController::class, 'index'])->name('posts_auhtor');

// Categories
// Route::get('/categories', [CategoryController::class, 'index'])->name('all_categories');