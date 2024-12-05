<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostItem extends Component
{
    public $post;

    function delete(Post $post) {
        $post->delete();
    }
    public function render()
    {
        return view('livewire.post-item');
    }
}
