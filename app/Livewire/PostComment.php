<?php

namespace App\Livewire;

use Mail;
use Notification;

use Livewire\Component;
use App\Notifications\CommentGiven;

class PostComment extends Component
{
    public $post;
    public $comment;
    public function save(){
        $this->validate(['comment' => 'required']);
       $comment = $this->post->comments()->create([
            'content' => $this->comment,
            'user_id' => auth()->user()->id,
            'post_id' => $this->post->id
        ]);
        $this->comment = '';
       
        Notification::send($this->post->user, new CommentGiven($comment, $this->post));
    }
    public function render()
    {
        return view('livewire.post-comment');
    }
}
