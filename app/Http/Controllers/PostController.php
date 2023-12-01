<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return view('items.index.manage-deposits', [
        'posts' => Collection::where('user_id', auth()->user()->id)->get()
      ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createItemSubmissionCenter()
    {
        $categories = Category::all();
        return view('items.create.item-submission-center', [
          'categories' => $categories
        ]);
    }

    public function createItemKeywords()
    {
      return view('items.create.item-keywords');
    }

    public function createItemDeposits()
    {
      return view('items.create.item-deposits');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
      $collection = Collection::where('slug', $slug)->firstOrFail();
      return view('dashboard.detail', ['post' => $collection]);
    } 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collection $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Collection $collection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection)
    {
        //
    }
}
