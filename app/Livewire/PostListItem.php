<?php

namespace App\Livewire;

use Livewire\Component;

class PostListItem extends Component
{
    public $post;
    public function render()
    {
        return view('livewire.post-list-item');
    }
}
