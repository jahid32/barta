<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class LikeButton extends Component
{
    public $isLiked = false;
    public $likesCount = 0;
    public $post;
    public function mount (Post $post) {
        $this->post = $post;
        $this->isLiked = $post->likes()->where('user_id', auth()->user()->id)->exists();
        $this->likesCount = $post->likes()->count();
    }
    public function toggleLike() {
        if ($this->isLiked) {
            $this->post->likes()->where('user_id', auth()->user()->id)->delete();
            $this->isLiked = false;
            $this->likesCount--;
        } else {
            $this->post->likes()->create([
                'user_id' => auth()->user()->id,
            ]);
            $this->isLiked = true;
            $this->likesCount++;
        }   
    }
}
