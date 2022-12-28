<?php

namespace Tests\Unit;

use App\Http\Livewire\Comments;
use App\Models\Comment;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Livewire;
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

    public function testSimpleMock()
    {
        $mock = \Mockery::mock(array('pi' => 3.1416, 'e' => 2.71));
        $this->assertEquals(3.1416, $mock->pi());
        $this->assertEquals(2.71, $mock->e());
    }
}
