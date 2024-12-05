<?php

namespace App\Livewire;

use Mail;
use Livewire\Component;
use App\Mail\CommentGiven;

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
        Mail::to($this->post->user->email)->send(new CommentGiven($comment, $this->post));
    }
    public function render()
    {
        return view('livewire.post-comment');
    }
}
