<?php

namespace Tests\Unit;

use App\Http\Livewire\Comments;
use App\Models\Comment;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Livewire;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;


class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    /** @test */
//    function can_create_post()
//    {
////        $this->actingAs(User::factory()->create());
//        Livewire::test(Comments::class)
//            ->set('newComment',[
//                'body' => 'aaa',
//                'created_at' => Carbon::now()->diffForHumans(),
//                'user_id' => 1,
//            ])
//            ->call('addComment');
//        dd(2);
//
//        $this->assertTrue(Comment::whereBody('aaa')->exists());
//    }

    public function testSimpleMock()
    {
        $mock = \Mockery::mock(array('pi' => 3.1416, 'e' => 2.71));
        $this->assertEquals(3.1416, $mock->pi());
        $this->assertEquals(2.71, $mock->e());
    }
}
