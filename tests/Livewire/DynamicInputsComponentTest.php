<?php

use App\Livewire\DynamicInputs;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(Tests\TestCase::class, RefreshDatabase::class);


test('it can add new row', function () {
    Livewire::test(DynamicInputs::class)
        ->call('addRow')
        ->call('addRow')
        ->assertSee('Add row')
        ->assertSet('formData', [
            [
                'id' => 1,
                'name' => 'sam',
                'address' => 'kandy',
                'age' => 23
            ],
            [
                'id' => 2,
                'name' => '',
                'address' => '',
                'age' => ''
            ],
            [
                'id' => 3,
                'name' => '',
                'address' => '',
                'age' => ''
            ]
        ]);
});

test('it can delete a row', function () {
    Livewire::test(DynamicInputs::class)
        ->call('addRow')
        ->call('addRow')
        ->call('deleteRow', 2)
        ->assertSee('Add row')
        ->assertSee('X')
        ->assertSet('formData', [
            [
                'id' => 1,
                'name' => 'sam',
                'address' => 'kandy',
                'age' => 23
            ],
            [
                'id' => 2,
                'name' => '',
                'address' => '',
                'age' => ''
            ]
        ]);
});

test('it can submit data with correct inputs', function () {
    Livewire::test(DynamicInputs::class)
        ->set('formData.0.name', 'jone')
        ->set('formData.0.address', 'new york')
        ->set('formData.0.age', 1)
        ->call('submit')
        ->assertHasNoErrors(['formData.0.name', 'formData.0.address', 'formData.0.age']);
});

test('it can not submit data with incorrect inputs', function () {
    Livewire::test(DynamicInputs::class)
        ->set('formData.0.name', 1)
        ->set('formData.0.address', 1)
        ->set('formData.0.age', 'invalid input')
        ->call('submit')
        ->assertHasErrors(['formData.0.name', 'formData.0.address', 'formData.0.age'])
        ->set('formData.0.name', null)
        ->set('formData.0.address', null)
        ->set('formData.0.age', null)
        ->call('submit')
        ->assertHasErrors(['formData.0.name', 'formData.0.address', 'formData.0.age']);
});
