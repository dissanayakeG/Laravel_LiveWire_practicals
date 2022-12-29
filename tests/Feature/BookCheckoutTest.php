<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Book;
use App\Models\User;
use App\Models\Reservation;

uses(RefreshDatabase::class);


it('a book can be checked out by a signed in user', function () {
    $this->withoutExceptionHandling();

    $book = Book::factory()->create();
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post('/checkout/' . $book->id);

    $this->assertCount(1, Reservation::all());
    $this->assertEquals($book->id, Reservation::first()->book_id);
    $this->assertEquals($user->id, Reservation::first()->user_id);
    $this->assertEquals(now(), Reservation::first()->checked_out_at);
});

it('only signed in users can be checked out a book', function () {
    $book = Book::factory()->create();

    $this->post('/checkout/' . $book->id)
        ->assertRedirect('/login');

    $this->assertCount(0, Reservation::all());
});

it('only real book can be checked out a book', function () {

    $user = User::factory()->create();

    $this->actingAs($user)
        ->post('/checkout/123')
        ->assertStatus(404);

    $this->assertCount(0, Reservation::all());
});

it('a book can be checked in by a signed in user', function () {
    $this->withoutExceptionHandling();

    $book = Book::factory()->create();
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post('/checkout/' . $book->id);

    $this->actingAs($user)
        ->post('/checkin/' . $book->id);

    $this->assertCount(1, Reservation::all());
    $this->assertEquals($book->id, Reservation::first()->book_id);
    $this->assertEquals($user->id, Reservation::first()->user_id);
    $this->assertEquals(now(), Reservation::first()->checked_out_at);
    $this->assertEquals(now(), Reservation::first()->checked_in_at);
});

it('only signed in users can be checked in a book', function () {
    $book = Book::factory()->create();
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post('/checkout/' . $book->id);

    \Illuminate\Support\Facades\Auth::logout();

    $this->post('/checkin/' . $book->id)->assertRedirect('/login');

    $this->assertCount(1, Reservation::all());
    $this->assertNull(Reservation::first()->checked_in_at);
});

it('404 is thrown if a book is not checked out first', function () {
    $book = Book::factory()->create();
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post('/checkin/' . $book->id)
        ->assertStatus(404);

    $this->assertCount(0, Reservation::all());
});


