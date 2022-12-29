<?php


namespace Tests\Feature;


use App\Models\Author;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can be added new book', function () {
    $this->withoutExceptionHandling();
    $response = $this->post('/books', [
        'title' => 'New title',
        'author_id' => 'Mds1',
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
        'author_id' => '',
    ]);
    $response->assertSessionHasErrors('author_id');
});

it('it can be updated a book', function () {
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
});

it('it can be deleted a book', function () {
    $this->post('/books', [
        'title' => 'New title',
        'author_id' => 'Mds1',
    ]);
    $book = Book::first();

    $response = $this->delete('/books/' . $book->id);
    $response->assertOk();
    $this->assertCount(0, Book::all());
});

it('it can be automatically added new author', function () {
    $this->withoutExceptionHandling();

    $this->post('/books', [
        'title' => 'New title',
        'author_id' => 'Mds1',
    ]);
    $book = Book::first();
    $author = Author::first();

    $this->assertEquals($author->id, $book->author_id);
    $this->assertCount(1, Author::all());
});



