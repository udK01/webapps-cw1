<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostComment extends Component
{

    public $post;
    public $description;
    protected $rules = [
        'description' => 'required|max:250',
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function submit() {
        $validatedData = $this->validate();
        $c = new Comment;
        $c->description = $validatedData['description'];
        $c->post_id = $this->post->id;
        $c->user_id = Auth::id();
        $c->save();
    }

    public function render()
    {
        return view('livewire.post-comment');
    }
}