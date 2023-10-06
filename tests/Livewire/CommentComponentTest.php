<?php

namespace Tests\Livewire;

use App\Livewire\Comments;
use App\Models\Comment;
use App\Models\User;
use Livewire\Livewire;
use Tests\TestCase;


class CommentComponentTest extends TestCase
{
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        $this->actingAs($this->user);
    }

    /** @test */
    function can_see_comment_component()
    {
        $this->get('/dashboard')->assertSeeLivewire('comments');
    }

    /** @test */
    function can_create_comment()
    {
        Livewire::test(Comments::class)
            ->set('newComment', 'aaa')
            ->call('addComment');

        $this->assertTrue(Comment::where(['body' => 'aaa'])->exists());
    }

    /** @test */
    function can_delete_comment()
    {
        Livewire::test(Comments::class)
            ->set('newComment', 'aaa')
            ->call('addComment');

        Livewire::test(Comments::class)
            ->call('deleteComment', 1);

        $this->assertDatabaseMissing('comments', ['id' => 1]);
        $this->assertCount(0, Comment::all());
    }
}
