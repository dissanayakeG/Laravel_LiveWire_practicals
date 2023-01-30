<?php

namespace App;

// Class under test
class Car {
  private $engine;
  
  public function __construct(Engine $engine) {
    $this->engine = $engine;
  }
  
  public function startEngine() {
    return $this->engine->start();
  }
}