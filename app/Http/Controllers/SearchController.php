<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        $posts = Post::where('content', 'like', "%$query%")->get();
        return view('search', [
            'posts' => $posts,
            'query' => $query
        ]);
    }
}
