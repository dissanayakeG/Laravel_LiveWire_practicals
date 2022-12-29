<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class BookManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_be_added_new_book()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/books', [
            'title' => 'New title',
            'author_id' => 'Mds1',
        ]);
        $response->assertOk();
        $this->assertCount(1, Book::all());
    }

    /** @test */
    public function it_can_not_be_added_new_book_without_title()
    {
        $response = $this->post('/books', [
            'title' => '',
        ]);
        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function it_can_not_be_added_new_book_without_author()
    {
        $response = $this->post('/books', [
            'title' => 'Some',
            'author_id' => '',
        ]);
        $response->assertSessionHasErrors('author_id');
    }

    /** @test */
    public function it_can_be_updated_a_book()
    {
        $this->post('/books', [
            'title' => 'New title',
            'author_id' => 'Mds1',
        ]);
        $book = Book::first();


        $this->patch('/books/' . $book->id, [
            'title' => 'Some title',
            'author_id' => 'Some author',
        ]);
        $this->assertEquals('Some title', Book::first()->title);
        $this->assertEquals('Mds1', Author::first()->name);
    }
}
