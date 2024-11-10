<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->orderby('created_at', 'desc')->paginate(15);

        return view('home', compact('posts'));
    }
}
