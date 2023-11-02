<?php

namespace App\Http\Controllers;

use App\Models\Collections;
use Illuminate\Http\Request;

class CollectionsController extends Controller
{
    public function index() {
        return view('search_collections', [
            'title' => "Search Collections",
            'collections' => Collections::all(),
        ]);
    }

    public function show($slug) {
        return view('collection', [
            'title' => "Collection",
            'collections' => Collections::where('slug', $slug)->first(),
        ]);
    }
}
