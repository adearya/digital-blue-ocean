<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Collection;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
  // Dashboard
  public function index(Request $request) {

    $searchTitle = $request->input('title');
    $searchAuthor = $request->input('author');
    $searchYear = $request->input('year');
    $searchSubjects = $request->input('category');

    $posts = Review::latest()
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
    $post = Review::where('slug', $slug)->first();

    if ($post) {
      $post->increment('views_count');
    }

    return view('dashboard.detail', [
      'title' => "Single Post",
      'post' => $post,
    ]);
  }

  public function store($slug) {
    $post = Collection::where('slug', $slug)->first();

    Review::create([
      'title' => $post->title,
      'slug' => $post->slug,
    ]);

    return redirect()->route('dashboard');
  }
}
