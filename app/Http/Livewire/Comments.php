<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\User;
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
        //$this->comments->prepend($comment);
        $this->newComment = "";
    }

    public function deleteComment($commentId)
    {
        $comment = Comment::find($commentId);
        $comment->delete();
        //$this->comments = $this->comments->except($commentId);
    }

    public function render()
    {
        return view('livewire.comments', ['comments' => Comment::latest()->paginate(15)]);
    }
}
