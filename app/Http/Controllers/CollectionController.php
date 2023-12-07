<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    // Dashboard
  public function index() {
    $collections = Collection::with('authors')->get();
    return view('admin.review', compact('collections'));      
  }

  // Detail Page
  public function show($slug) {
    $post = Collection::where('slug', $slug)->first();

    if ($post) {
      $post->increment('views_count');
    }

    return view('dashboard.detail', [
      'title' => "Single Post",
      'post' => $post,
    ]);
  }
}
