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
        if ($this->newComment == '') {
            return;
        }
        array_unshift($this->comments, [
            'creator' => 'Mds walker',
            'created_at' => Carbon::now()->diffForHumans(),
            'body' => $this->newComment
        ]);
        $this->newComment = "";
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
