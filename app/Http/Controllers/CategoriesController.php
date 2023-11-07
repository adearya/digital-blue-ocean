<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index() {
        return view('categories.get_categories', [
            'title' => "Lists Category",
            'categories' => Categories::all()
        ]);
    }

    public function show($category) {
        return view('categories.get_category', [
            'title' => $category->name,
            'categories' => $category->collections,
        ]);
    }
}
