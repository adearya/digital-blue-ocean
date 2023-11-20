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
        $posts = Post::latest()
            ->searchByTitle($searchTitle)
            ->searchByAuthor($searchAuthor)
            ->searchByYear($searchYear)
            ->searchBySubjects($searchSubjects)
            ->paginate(10);

        return view('dashboard.all_posts', [
            'title' => "All Post",
            'posts' => $posts,
        ]);
    }

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
