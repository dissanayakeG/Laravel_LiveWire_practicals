<?php


namespace Tests\Feature;

use App\Car;
use App\Context;
use App\Engine;
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

it('test start engine', function(){
        //Method 1
        
        // Create a mock object for the Engine dependency
        // $engine = $this->getMockBuilder(Engine::class)
        //               ->setMethods(['start'])
        //               ->getMock();
        
        // // Configure the mock object's behavior
        // $engine->expects($this->once())
        //        ->method('start')
        //        ->willReturn('Engine started');


        //Method 2
        $engine = $this->mock(Engine::class, function(MockInterface $mock){
            $mock->shouldReceive('start')
                 ->once()
                 ->andReturn('Engine started');

        });
        
        // Create an instance of the class under test
        $car = new Car($engine);
        
        // Verify that the class under test behaves as expected
        $this->assertEquals('Engine started', $car->startEngine());
      
});



