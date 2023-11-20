<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // public function index() {
    //     return view('partials.categories.all_categories', [
    //         'title' => "All Categories",
    //         'categories' => Categories::all(),
    //     ]);
    // }

    public function index(Category $category) {
        return view('dashboard.all_posts', [
            'title' => "Post by: $category->name",
            'posts' => $category->post->load('category', 'author'),
        ]);
    }
}
