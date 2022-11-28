<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

//    public $comments;
    public $newComment;

//    public function mount(/*$commentsAsProp*/)
//    {
//        $commentsAsProp = Comment::all();
//        $this->comments = $commentsAsProp;
//    }

    public function addComment()
    {
        $this->validate([
            'newComment' => 'required | max:20'
        ]);

        $comment = Comment::create([
            'body' => $this->newComment,
            'created_at' => Carbon::now()->diffForHumans(),
            'user_id' => 1,
        ]);
//        $this->comments->prepend($comment);
        $this->newComment = "";
    }

    public function deleteComment($commentId)
    {
        $comment = Comment::find($commentId);
        $comment->delete();
//        $this->comments = $this->comments->except($commentId);
    }

    public function render()
    {
        return view('livewire.comments', ['comments' => Comment::latest()->paginate(5)]);
    }
}
