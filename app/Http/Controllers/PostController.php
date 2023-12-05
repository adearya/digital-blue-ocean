<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Author;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index() {
    $collections = Collection::with('authors')->get();
    return view('items.index.manage-deposits', compact('collections'));      
  }

  public function createItemSubmissionCenter() {
    return view('items.create.item-submission-center');
  }

  public function storeItemSubmissionCenter(Request $request) {
    $validatedData = $request->validate([
      'title' => 'required|max:255',
      'slug' => 'required|max:255',
      'author' => 'required|array',
    ]);    

    $request->session()->put('post_data', $validatedData);
  
    return redirect()->route('create-item-keywords');
  }

  public function createItemKeywords() {
    return view('items.create.item-keywords');
  }

  public function storeItemKeywords(Request $request) {
    return redirect()->route('create-item-deposits');    
  }

  public function createItemDeposits() {
    return view('items.create.item-deposits');
  }
  
  public function storeItemDeposits(Request $request) {
    $postData = session('post_data');

    $collection = Collection::create([
      'title' => $postData['title'],
      'slug' => $postData['slug'],
    ]);

    // Inisialisasi array untuk menyimpan ID penulis
    $authorIds = [];

    // Loop untuk setiap penulis yang dikirimkan dari formulir
    foreach ($postData['author'] as $authorName) {
      // Cari penulis berdasarkan nama atau buat penulis baru jika tidak ditemukan
      $author = Author::firstOrCreate(['name' => $authorName]);

      // Tambahkan ID penulis ke dalam array
      $authorIds[] = $author->id;
    }

    // Lampirkan penulis-penulis ke buku yang baru dibuat
    $collection->authors()->attach($authorIds);

    // Hapus data dari session setelah digunakan
    $request->session()->forget('post_data');

    return redirect('/dashboard/manage-deposits');
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
