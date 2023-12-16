<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    //
     // public function index(User $author) {
    //     return view('dashboard.index', [
    //         'title' => "Post by: $author->name",
    //         'posts' => $author->collection->load('category', 'author'),
    //     ]);
    // }

  //   public function index(User $author) {
  //     $collections = Collection::where('user_id', $author->id)
  //         ->with('category', 'author') // Pastikan relasi ini sudah didefinisikan di model Collection
  //         ->paginate(10); // Sesuaikan jumlah item per halaman sesuai kebutuhan
  
  //     return view('dashboard.index', [
  //         'title' => "Collections by: $author->name",
  //         'posts' => $collections,
  //     ]);
  // }
}
