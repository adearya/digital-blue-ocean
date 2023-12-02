<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Collection;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // public function index() {
    //     return view('partials.categories.all_categories', [
    //         'title' => "All Categories",
    //         'categories' => Categories::all(),
    //     ]);
    // }

    // public function index(Category $category) {
    //     return view('dashboard.index', [
    //         'title' => "Post by: $category->name",
    //         'posts' => $category->collection->load('category', 'author'),
    //     ]);
    // }

    public function index(Category $category) {
      $collections = Collection::where('category_id', $category->id)
          ->with('category', 'author') // Pastikan relasi ini sudah didefinisikan di model Collection
          ->paginate(10); // Sesuaikan jumlah item per halaman sesuai kebutuhan
  
      return view('dashboard.index', [
          'title' => "Collections by: $category->name",
          'posts' => $collections,
      ]);
  }
}
