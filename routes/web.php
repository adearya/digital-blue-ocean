<?php

use App\Http\Controllers\DepositController;
use App\Http\Controllers\PublishController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Models\Post;
use App\Models\User;
use App\Models\Publish;
use App\Models\Collection;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard/item-submission-center/{deposit}', [PublishController::class, 'editItemSubmissionCenter'])->name('edit-item-submission-center-dashboard');
Route::put('/dashboard/item-submission-center/{deposit}', [PublishController::class, 'updateItemSubmissionCenter'])->name('update-item-submission-center-dashboard');
Route::get('/dashboard/item-keywords/{deposit}', [PublishController::class, 'editItemKeywords'])->name('edit-item-keywords-dashboard');
Route::put('/dashboard/item-keywords/{deposit}', [PublishController::class, 'updateItemKeywords'])->name('update-item-keywords-dashboard');
Route::get('/dashboard/item-deposits/{deposit}', [PublishController::class, 'editItemDeposits'])->name('edit-item-deposits-dashboard');
Route::put('/dashboard/item-deposits/{deposit}', [PublishController::class, 'updateItemDeposits'])->name('update-item-deposits-dashboard');

Route::delete('/dashboard/{slug}', [PublishController::class, 'destroy'])->name('destroy-dashboard');

Route::get('/download/{filename}', [PublishController::class, 'downloadFile'])->name('download-file');

Route::get('/dashboard/profile', [ProfileController::class, 'indexProfile'])->name('index-profile');
Route::get('/dashboard/profile/{username}', [ProfileController::class, 'editProfile'])->name('edit-profile');
Route::put('/dashboard/profile/{username}', [ProfileController::class, 'updateProfile'])->name('update-profile');

Route::get('/dashboard/admin/status', [AuthorizationController::class, 'statusAdmin'])->name('status-admin');
Route::get('/dashboard/admin/edit', [AuthorizationController::class, 'editAdmin'])->name('edit-admin');
Route::post('/dashboard/admin', [AuthorizationController::class, 'updateAdmin'])->name('update-admin');

Route::get('/dashboard/review', [PublishController::class, 'indexReview']);
Route::post('/dashboard/review/{slug}', [PublishController::class, 'store'])->name('publish');

Route::get('/dashboard/manage-deposit/item-submission-center/{deposit}', [DepositController::class, 'editItemSubmissionCenter'])->name('edit-item-submission-center');
Route::put('/dashboard/manage-deposit/item-submission-center/{deposit}', [DepositController::class, 'updateItemSubmissionCenter'])->name('update-item-submission-center');
Route::get('/dashboard/manage-deposit/item-keywords/{deposit}', [DepositController::class, 'editItemKeywords'])->name('edit-item-keywords');
Route::put('/dashboard/manage-deposit/item-keywords/{deposit}', [DepositController::class, 'updateItemKeywords'])->name('update-item-keywords');
Route::get('/dashboard/manage-deposit/item-deposits/{deposit}', [DepositController::class, 'editItemDeposits'])->name('edit-item-deposits');
Route::put('/dashboard/manage-deposit/item-deposits/{deposit}', [DepositController::class, 'updateItemDeposits'])->name('update-item-deposits');

Route::delete('/dashboard/manage-deposit/{slug}', [DepositController::class, 'destroy'])->name('destroy-deposit');
Route::get('/dashboard/manage-deposit', [DepositController::class, 'indexManageDeposit'])->name('manage-deposit');

Route::get('/dashboard/manage-deposit/item-submission-center', [DepositController::class, 'createItemSubmissionCenter'])->name('create-item-submission-center');
Route::post('/dashboard/manage-deposit/item-submission-center', [DepositController::class, 'storeItemSubmissionCenter'])->name('store-item-submission-center');
Route::get('/dashboard/manage-deposit/item-keywords', [DepositController::class, 'createItemKeywords'])->name('create-item-keywords');
Route::post('/dashboard/manage-deposit/item-keywords', [DepositController::class, 'storeItemKeywords'])->name('store-item-keywords');
Route::get('/dashboard/manage-deposit/item-deposits', [DepositController::class, 'createItemDeposits'])->name('create-item-deposits');
Route::post('/dashboard/manage-deposit/item-deposits', [DepositController::class, 'storeItemDeposits'])->name('store-item-deposits');


Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/signup', [SignupController::class, 'index']);
Route::post('/signup', [SignupController::class, 'store']);

// Landing Page
Route::get('/', function () {    
  $latestPosts = Publish::latest()->take(5)->get(['title', 'views_count', 'slug']);
  $topDownloads = Publish::orderBy('download_count', 'desc')->orderBy('title', 'asc')->take(5)->get();
  $topUsers = User::orderBy('download_count', 'desc')->take(5)->get();
  $totalItems = Publish::count();
  $totalDownloads = User::sum('download_count');
  $totalUsers = User::count(); // Jumlah total pengguna
  

  return view('landing_page.index', [
    'posts' => $latestPosts,
    'topDownloads' => $topDownloads,
    'topUsers' => $topUsers,
    'totalItems' => $totalItems,
    'totalDownloads' => $totalDownloads,
    'totalUsers' => $totalUsers,
  ]);
  })->name('landing_page');

// Dashboard
Route::get('/posts', [PublishController::class, 'index'])->name('dashboard');

// Detail Page
Route::get('/manage-deposit/{slug}', [DepositController::class, 'show'])->name('detail-deposit');
Route::get('/posts/{slug}', [PublishController::class, 'show'])->name('detail');

// Posts by Category
// Route::get('/category/{category:slug}', [CategoryController::class, 'index'])->name('single_category');

// Posts by Author
// Route::get('/author/{author:username}', [AuthorController::class, 'index'])->name('posts_auhtor');

// Categories
// Route::get('/categories', [CategoryController::class, 'index'])->name('all_categories');