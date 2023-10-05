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
        $this->comments = Comment::all();
    }

    #[Computed]
    public function comments()
    {
        $this->comments = Comment::all();

        return $this->comments;
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
        $comment = Comment::create(
            [
                'body' => $this->newComment,
                'created_at' => Carbon::now()->diffForHumans(),
                'user_id' => User::firstOrCreate(
                    ['email' => 'u1@gmail.com'],
                    ['name' => 'U1', 'password' => bcrypt('123123')]
                )->id
            ]
        );
        $this->comments->prepend($comment);
        $this->newComment = '';
    }

    public function deleteComment($commentId)
    {
        $comment = Comment::find($commentId);
        $comment->delete();
        $this->comments = Comment::all();
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
