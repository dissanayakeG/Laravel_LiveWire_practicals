<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Author;

uses(RefreshDatabase::class);

it('only name is required to create an author', function () {
    Author::create([
        'name'=>'Jone Doe'
    ]);
    $this->assertCount(1, Author::all());
});

