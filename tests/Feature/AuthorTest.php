<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Author;
use Illuminate\Support\Carbon;

uses(RefreshDatabase::class);

it('it can be add new author', function () {
    $this->withoutExceptionHandling();
    $response= $this->post('/author', [
        'name' => 'New title',
        'dob' => '05/10/1994',
    ]);
    $author = Author::all();
    $response->assertOk();
    $this->assertCount(1, $author);
    $this->assertCount(1, Author::all());
    $this->assertInstanceOf(Carbon::class, $author->first()->dob);
    $this->assertEquals('05/10/1994', $author->first()->dob->format('m/d/Y'));
});

