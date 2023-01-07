<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CommentNotification;

class PostComment extends Component
{

    public $post;
    public $description;
    protected $listeners = ['refreshComponent' => '$refresh'];
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
        $this->post->user->notify(new CommentNotification);
        $this->reset('description');
        $this->emit('refreshComponent');
    }

    public function render()
    {
        return view('livewire.post-comment');
    }
}