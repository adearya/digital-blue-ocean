<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(User $author) {
        return view('dashboard.all_posts', [
            'title' => "Post by: $author->name",
            'posts' => $author->post->load('category', 'author'),
        ]);
    }
}
