<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class ShowPosts extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $is_profile = false;


    public function render()
    {
        if ($this->is_profile) {
            $posts = auth()->user()->posts()->orderBy('id', 'desc')->cursorPaginate(10);
        }else{
            $posts= Post::orderBy('id', 'desc')->cursorPaginate(10);
        }
        return view('livewire.show-posts', ['posts' => $posts]);
    }
}
