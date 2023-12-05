<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Author;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      // return view('items.index.manage-deposits', [
        $collections = Collection::with('authors')->get();

        return view('items.index.manage-deposits', compact('collections'));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createItemSubmissionCenter()
    {
        return view('items.create.item-submission-center');
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
    public function storeItemSubmissionCenter(Request $request)
    {
      
      // Validasi data jika diperlukan
      $validatedData = $request->validate([
          'title' => 'required|max:255',
          'slug' => 'required|max:255',
          'author' => 'required|array',
          // tambahkan aturan validasi lainnya sesuai kebutuhan
      ]);
      

      $request->session()->put('post_data', $validatedData);
      // dd(session('post_data'));
      
      // dd($request->author);

      return redirect()->route('create-item-keywords');
    }

    public function storeItemKeywords(Request $request)
    {
      
      
      return redirect()->route('create-item-deposits');    
    }

    public function storeItemDeposits(Request $request)
    {
      // Ambil data dari session
      $postData = session('post_data');

      // Buat buku baru
      $book = Collection::create([
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
      $book->authors()->attach($authorIds);

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
