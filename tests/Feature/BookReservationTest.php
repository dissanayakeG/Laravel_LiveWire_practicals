<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(RefreshDatabase::class);

it('can be added new book', function () {
    $this->withoutExceptionHandling();
    $response = $this->post('/books', [
        'title' => 'New title',
        'author' => 'Mds1',
    ]);
    $response->assertOk();
    $this->assertCount(1, Book::all());

});

it('it can not be added new book without title', function () {
    $response = $this->post('/books', [
        'title' => '',
    ]);
    $response->assertSessionHasErrors('title');
});

it('it can not be added new book without author', function () {
    $response = $this->post('/books', [
        'title' => 'Some',
        'author' => '',
    ]);
    $response->assertSessionHasErrors('author');
});

it('it can be updated a book', function () {
    $this->post('/books', [
        'title' => 'New title',
        'author' => 'Mds1',
    ]);
    $book = Book::first();

    $this->patch('/books/' . $book->id, [
        'title' => 'Some title',
        'author' => 'Some author',
    ]);
    $this->assertEquals('Some title', Book::first()->title);
    $this->assertEquals('Some author', Book::first()->author);
});

//
//class BookReservationTest extends TestCase
//{
//    use RefreshDatabase;
//
//    /** @test */
//    public function it_can_be_added_new_book()
//    {
//        $this->withoutExceptionHandling();
//        $response = $this->post('/books', [
//            'title' => 'New title',
//            'author' => 'Mds1',
//        ]);
//        $response->assertOk();
//        $this->assertCount(1, Book::all());
//    }
//
//    /** @test */
//    public function it_can_not_be_added_new_book_without_title()
//    {
//        $response = $this->post('/books', [
//            'title' => '',
//        ]);
//        $response->assertSessionHasErrors('title');
//    }
//
//    /** @test */
//    public function it_can_not_be_added_new_book_without_author()
//    {
//        $response = $this->post('/books', [
//            'title' => 'Some',
//            'author' => '',
//        ]);
//        $response->assertSessionHasErrors('author');
//    }
//
//    /** @test */
//    public function it_can_be_updated_a_book()
//    {
//        $this->post('/books', [
//            'title' => 'New title',
//            'author' => 'Mds1',
//        ]);
//        $book = Book::first();
//
//        $this->patch('/books/' . $book->id, [
//            'title' => 'Some title',
//            'author' => 'Some author',
//        ]);
//        $this->assertEquals('Some title', Book::first()->title);
//        $this->assertEquals('Some author', Book::first()->author);
//    }
//}
