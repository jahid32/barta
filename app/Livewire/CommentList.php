<?php

namespace App\Livewire;

use Livewire\Component;

class CommentList extends Component
{
    public $comments;
    public function render()
    {
        return view('livewire.comment-list');
    }
}
