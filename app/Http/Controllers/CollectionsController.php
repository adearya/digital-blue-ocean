<?php

namespace App\Http\Controllers;

use App\Models\Collections;
use Illuminate\Http\Request;

class CollectionsController extends Controller
{
    public function index() {
        return view('collections.get_collections', [
            'title' => "Collections",
            'collections' => Collections::all(),
        ]);
    }

    public function show($slug) {
        return view('collections.get_collection', [
            'title' => "Collection",
            'collection' => Collections::where('slug', $slug)->first(),
        ]);
    }
}
