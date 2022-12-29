<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Author;

uses(Tests\TestCase::class, RefreshDatabase::class);

test('only name is required to create an author', function () {
    Author::firstOrCreate([
        'name' => 'Jone Doe'
    ]);
    $this->assertCount(1, Author::all());
});
