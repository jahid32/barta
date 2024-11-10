<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images', 'public');
        }

        $post = Post::create(
            [
                'content' => $request->content,
                'user_id' => $request->user()->id,
                'image' => $image ?? null,
            ]
        );

        return redirect()->route('discover');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images', 'public');
        }

        $post->image = $image ?? $post->image;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->user_id !== auth()->user()->id) {
            return redirect()->route('discover');
        }
        $post->delete();

        return redirect()->route('profile.index');
    }
}
