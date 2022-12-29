<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Book;
use App\Models\User;
use App\Models\Reservation;

uses(Tests\TestCase::class, RefreshDatabase::class);

//art make:factory BookFactory -m Book

it('can be checked out a book', function () {
    $book = Book::factory()->create();
    $user = User::factory()->create();

    $book->checkout($user);

    $this->assertCount(1, Reservation::all());
    $this->assertEquals($user->id, Reservation::first()->user_id);
    $this->assertEquals($book->id, Reservation::first()->book_id);
    $this->assertEquals(now(), Reservation::first()->checked_out_at);

});

it('can be checked in a book', function () {
    $book = Book::factory()->create();
    $user = User::factory()->create();
    $book->checkout($user);

    $book->checkin($user);

    $this->assertCount(1, Reservation::all());
    $this->assertEquals($user->id, Reservation::first()->user_id);
    $this->assertEquals($book->id, Reservation::first()->book_id);
    $this->assertNotNull(Reservation::first()->checked_in_at);
    $this->assertEquals(now(), Reservation::first()->checked_in_at);
});

it('can be checked out a book twice', function () {
    $book = Book::factory()->create();
    $user = User::factory()->create();

    $book->checkout($user);
    $book->checkin($user);
    $book->checkout($user);

    $this->assertCount(2, Reservation::all());
    $this->assertEquals($user->id, Reservation::find(2)->user_id);
    $this->assertEquals($book->id, Reservation::find(2)->book_id);
    $this->assertNull(Reservation::find(2)->checked_in_at);
    $this->assertEquals(now(), Reservation::find(2)->checked_out_at);

    $book->checkin($user);

    $this->assertCount(2, Reservation::all());
    $this->assertEquals($user->id, Reservation::find(2)->user_id);
    $this->assertEquals($book->id, Reservation::find(2)->book_id);
    $this->assertNotNull(Reservation::find(2)->checked_in_at);
    $this->assertEquals(now(), Reservation::find(2)->checked_in_at);
});

it('throws an exception if not checked out', function () {
    $this->expectException(\Exception::class);
    $book = Book::factory()->create();
    $user = User::factory()->create();
    $book->checkin($user);
});

