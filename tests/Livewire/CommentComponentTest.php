<?php

namespace Tests\Livewire;

use App\Http\Livewire\Comments;
use App\Models\Comment;
use Livewire\Livewire;
use Tests\TestCase;


class CommentComponentTest extends TestCase
{
    /** @test */
    function can_see_comment_component()
    {
        $this->get('/')->assertSeeLivewire('comments');
    }

    /** @test */
    function can_create_comment()
    {
        Livewire::test(Comments::class)
            ->set('newComment','aaa')
            ->call('addComment');

        $this->assertTrue(Comment::where(['body'=>'aaa'])->exists());
    }

    /** @test */
    function can_delete_comment()
    {
        Livewire::test(Comments::class)
            ->set('newComment','aaa')
            ->call('addComment');

        Livewire::test(Comments::class)
            ->call('deleteComment',1);

        $this->assertDatabaseMissing('comments',['id'=>1]);
        $this->assertCount(0, Comment::all());
    }
}
