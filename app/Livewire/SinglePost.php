<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class SinglePost extends Component
{
    public Post $post;

    public function mount($post) {
        $post->load('user')->load('likes')->load('comments');
        
        $this->post = $post;
    }
    public function render()
    {
        return view('livewire.single-post');
    }
}
