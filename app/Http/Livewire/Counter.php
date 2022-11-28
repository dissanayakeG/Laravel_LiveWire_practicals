<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $counter = 1;
    public function render()
    {
//        return view('livewire.counter', ['count'=>$this->counter]);
        return view('livewire.counter');
    }

    public function increment(){
        $this->counter = $this->counter+1;
    }

    public function decrement(){
        $this->counter = $this->counter-1;
    }
}
