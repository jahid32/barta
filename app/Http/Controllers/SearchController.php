<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'query' => 'required|string|max:255',
        ]);

        $searchTerm = $request->input('query');
        $posts = Post::searchByUser($searchTerm)->get();

        return view('post.search', [
            'posts' => $posts,
        ]);
    }
}
