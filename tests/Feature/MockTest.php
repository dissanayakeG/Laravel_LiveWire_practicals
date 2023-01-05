<?php


namespace Tests\Feature;


use App\Context;
use App\Http\Controllers\MockTestController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery\MockInterface;

uses(RefreshDatabase::class);

it('can mock object', function () {
    $this->mock(Context::class, function (MockInterface $mock) {
//        $mock->shouldReceive('perform')->once();
        $mock->shouldReceive('perform')->once()->andReturn(5);
    });

    app(MockTestController::class)->execute();
});



