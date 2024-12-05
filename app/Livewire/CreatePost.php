<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class CreatePost extends Component
{
    use WithFileUploads;
    
    #[Validate('required|min:3')] 
    public $content = '';
    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048')] 
    public  $picture = null;

    public function save(){
        $this->validate();

        $imagePath  = $this->picture ? $this->picture->store(path: 'photos') : null;

        Post::create([
            'content' => $this->content,
            'user_id' => auth()->user()->id,
            'image' => $imagePath
        ]);

        $this->content = '';
        $this->picture = null;

        return redirect()->route('discover');
 
    }
}
