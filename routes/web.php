<?php

// Import Controllers
use App\Http\Controllers\DepositController;
use App\Http\Controllers\PublishController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\GoogleController;

// Import Models
use App\Models\Post;
use App\Models\User;
use App\Models\Publish;
use App\Models\Collection;
use App\Models\Category;

// Import Route
use Illuminate\Support\Facades\Route;

// Send Email (Experiment)
Route::post('/send-email', [EmailController::class, 'sendEmail']);

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Update Collection Publish
Route::get('/dashboard/item-submission-center/{deposit}', [PublishController::class, 'editItemSubmissionCenter'])->middleware('auth')->name('edit-item-submission-center-dashboard');
Route::put('/dashboard/item-submission-center/{deposit}', [PublishController::class, 'updateItemSubmissionCenter'])->middleware('auth')->name('update-item-submission-center-dashboard');
Route::get('/dashboard/item-keywords/{deposit}', [PublishController::class, 'editItemKeywords'])->middleware('auth')->name('edit-item-keywords-dashboard');
Route::put('/dashboard/item-keywords/{deposit}', [PublishController::class, 'updateItemKeywords'])->middleware('auth')->name('update-item-keywords-dashboard');
Route::get('/dashboard/item-deposits/{deposit}', [PublishController::class, 'editItemDeposits'])->middleware('auth')->name('edit-item-deposits-dashboard');
Route::put('/dashboard/item-deposits/{deposit}', [PublishController::class, 'updateItemDeposits'])->middleware('auth')->name('update-item-deposits-dashboard');

// Delete Collection Publish
Route::delete('/dashboard/{slug}', [PublishController::class, 'destroy'])->middleware('auth')->name('destroy-dashboard');

// Download Collection Publish
Route::get('/download/{filename}', [PublishController::class, 'downloadFile'])->middleware('auth')->name('download-file');

// User Profile Read and Update 
Route::get('/dashboard/profile', [ProfileController::class, 'indexProfile'])->middleware('auth')->name('index-profile');
Route::get('/dashboard/profile/{username}', [ProfileController::class, 'editProfile'])->middleware('auth')->name('edit-profile');
Route::put('/dashboard/profile/{username}', [ProfileController::class, 'updateProfile'])->middleware('auth')->name('update-profile');

// Admin Panel
Route::get('/dashboard/admin/status', [AuthorizationController::class, 'statusAdmin'])->middleware('auth')->name('status-admin');
Route::get('/dashboard/admin/edit', [AuthorizationController::class, 'editAdmin'])->middleware('auth')->name('edit-admin');
Route::post('/dashboard/admin', [AuthorizationController::class, 'updateAdmin'])->middleware('auth')->name('update-admin');

// Deposit Review
Route::get('/dashboard/review', [PublishController::class, 'indexReview'])->middleware('auth');
Route::post('/dashboard/review/{slug}', [PublishController::class, 'store'])->middleware('auth')->name('publish');

// Update Deposit
Route::get('/dashboard/manage-deposit/item-submission-center/{deposit}', [DepositController::class, 'editItemSubmissionCenter'])->middleware('auth')->name('edit-item-submission-center');
Route::put('/dashboard/manage-deposit/item-submission-center/{deposit}', [DepositController::class, 'updateItemSubmissionCenter'])->middleware('auth')->name('update-item-submission-center');
Route::get('/dashboard/manage-deposit/item-keywords/{deposit}', [DepositController::class, 'editItemKeywords'])->middleware('auth')->name('edit-item-keywords');
Route::put('/dashboard/manage-deposit/item-keywords/{deposit}', [DepositController::class, 'updateItemKeywords'])->middleware('auth')->name('update-item-keywords');
Route::get('/dashboard/manage-deposit/item-deposits/{deposit}', [DepositController::class, 'editItemDeposits'])->middleware('auth')->name('edit-item-deposits');
Route::put('/dashboard/manage-deposit/item-deposits/{deposit}', [DepositController::class, 'updateItemDeposits'])->middleware('auth')->name('update-item-deposits');

// Delete Deposit
Route::delete('/dashboard/manage-deposit/{slug}', [DepositController::class, 'destroy'])->middleware('auth')->name('destroy-deposit');

// Manage Deposit
Route::get('/dashboard/manage-deposit', [DepositController::class, 'indexManageDeposit'])->middleware('auth')->name('manage-deposit');

// Create Deposit
Route::get('/dashboard/manage-deposit/item-submission-center', [DepositController::class, 'createItemSubmissionCenter'])->middleware('auth')->name('create-item-submission-center');
Route::post('/dashboard/manage-deposit/item-submission-center', [DepositController::class, 'storeItemSubmissionCenter'])->middleware('auth')->name('store-item-submission-center');
Route::get('/dashboard/manage-deposit/item-keywords', [DepositController::class, 'createItemKeywords'])->middleware('auth')->name('create-item-keywords');
Route::post('/dashboard/manage-deposit/item-keywords', [DepositController::class, 'storeItemKeywords'])->middleware('auth')->name('store-item-keywords');
Route::get('/dashboard/manage-deposit/item-deposits', [DepositController::class, 'createItemDeposits'])->middleware('auth')->name('create-item-deposits');
Route::post('/dashboard/manage-deposit/item-deposits', [DepositController::class, 'storeItemDeposits'])->middleware('auth')->name('store-item-deposits');

// User Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

// User Signup
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
Route::get('/dashboard', [PublishController::class, 'index'])->name('dashboard');

// Detail Page
Route::get('/dashboard/manage-deposit/{slug}', [DepositController::class, 'show'])->name('detail-deposit');
Route::get('/dashboard/{slug}', [PublishController::class, 'show'])->name('detail');