<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    // Dashboard
  public function index(Request $request) {

    $searchTitle = $request->input('title');
    $searchAuthor = $request->input('author');
    $searchYear = $request->input('year');
    $searchSubjects = $request->input('category');

    $posts = Collection::latest()
      ->searchByTitle($searchTitle)
      ->searchByAuthor($searchAuthor)
      ->searchByYear($searchYear)
      ->searchBySubjects($searchSubjects)
      ->paginate(10);

    return view('dashboard.index', [
      'title' => "All Post",
      'posts' => $posts,
    ]);
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
