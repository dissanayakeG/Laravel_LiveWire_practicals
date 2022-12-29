<?php

namespace Tests\Unit;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class BookTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_be_recorded_author_id()
    {
        Book::create([
            'title' => 'Some',
            'author_id' => 1
        ]);
        $this->assertCount(1, Book::all());
    }
}
