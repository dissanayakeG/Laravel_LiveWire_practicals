<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;


class Comments extends Component
{
    use WithPagination;

    public $comments;
    public $newComment = '';

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
                'user_id' => User::firstOrCreate(
                    ['email' => 'u1@gmail.com'],
                    ['name' => 'U1', 'password' => bcrypt('123123')]
                )->id
            ]
        );
        $this->newComment = '';
        $this->fetchComments();
    }

    public function deleteComment(Comment $comment)
    {
        $comment->delete();
        $this->fetchComments();
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
