<?php

namespace App\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $comments;
    public $newComment = '';
    public $search = '';

    //    public function mount(/*$commentsAsProp*/)
    //    {
    //        $commentsAsProp = Comment::all();
    //        $this->comments = $commentsAsProp;
    //    }

    public function mount()
    {
        $this->fetchComments();
    }

    public function fetchComments()
    {
        $this->comments = Comment::all();
    }

    protected function rules()
    {
        return [
            'newComment' => 'required|max:20',
        ];
    }

    //realtime validations
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addComment()
    {
        $this->validate();
        Comment::create(
            [
                'body' => $this->newComment,
                'created_at' => Carbon::now()->diffForHumans(),
                'user_id' => auth()->user()->id,
            ]
        );
        $this->reset('newComment');
        $this->fetchComments();
    }

    public function deleteComment(Comment $comment)
    {
        if ($comment->user_id === auth()->id()) {
            $comment->delete();
            $this->fetchComments();
            session()->flash('message', 'Comment deleted successfully.');
        } else {
            session()->flash('message', 'You do not have permission to delete this comment.');
        }
    }

    public function updatedSearch(){
        // $this->comments = $this->comments->filter(function($comment) {
        //     return str_contains($comment->body, $this->search);
        // });

        $this->comments = Comment::where('body', 'like', '%' . $this->search . '%')->get();

    }

    public function render()
    {
        return view('livewire.comments');
    }
}
