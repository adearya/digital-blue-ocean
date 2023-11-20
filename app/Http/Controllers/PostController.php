<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request) {
        // Ambil nilai dari empat input pencarian
        $searchTitle = $request->input('title');
        $searchAuthor = $request->input('author');
        $searchYear = $request->input('year');
        $searchSubjects = $request->input('category');

        // Mulai query dengan metode latest()
        $posts = Post::latest();

        // Tambahkan kondisi WHERE hanya jika nilai input tidak kosong
        if ($searchTitle) {
            $posts->where('title', 'like', '%' . $searchTitle . '%');
        }

        if ($searchAuthor) {
            $posts->whereHas('author', function ($query) use ($searchAuthor) {
                $query->where('name', 'like', '%' . $searchAuthor . '%');
            });
        }

        if ($searchYear) {
            $posts->where('year', 'like', '%' . $searchYear . '%');
        }

        if ($searchSubjects) {
            $posts->whereHas('category', function ($query) use ($searchSubjects) {
                $query->where('name', 'like', '%' . $searchSubjects . '%');
            });
        }

        // Ambil hasil query
        $posts = $posts->get();

        return view('dashboard.all_posts', [
            'title' => "All Post",
            'posts' => $posts,
        ]);
    }
    // public function index() {
    //     $posts = Post::latest();

    //     if(request('search')) {
    //         $posts->where('title', 'like', '%'. request('search') . '%');
    //     }

    //     return view('dashboard.all_posts', [
    //         'title' => "All Post",
    //         'posts' => $posts->get(),
    //     ]);
    // }

    public function show($slug) {
        $post = Post::where('slug', $slug)->first();

        if ($post) {
            $post->increment('views_count');
        }

        return view('dashboard.single_post', [
            'title' => "Single Post",
            'post' => $post,
        ]);
    }
}
