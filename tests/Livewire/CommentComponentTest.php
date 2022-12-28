<?php

namespace Tests\Livewire;

use App\Http\Livewire\Comments;
use App\Models\Comment;
use Livewire\Livewire;
use Tests\TestCase;


class CommentComponentTest extends TestCase
{
    /** @test */
    function can_create_postssssssssss()
    {
        Livewire::test(Comments::class)
            ->set('newComment','aaa')
            ->call('addComment');

        $this->assertTrue(Comment::where(['body'=>'aaa'])->exists());
    }
}
