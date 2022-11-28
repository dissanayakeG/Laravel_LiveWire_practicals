<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $comments;

    public $newComment;

    public function mount(/*$commentsAsProp*/)
    {
        $commentsAsProp = Comment::all();
        $this->comments = $commentsAsProp;
    }

    public function addComment()
    {
       $this->validate([
           'newComment' => 'required | max:20'
       ]);

        $comment = Comment::create([
            'body'=> $this->newComment,
            'created_at' => Carbon::now()->diffForHumans(),
            'user_id' => 1,
        ]);
        $this->comments->prepend($comment);
        $this->newComment = "";
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
