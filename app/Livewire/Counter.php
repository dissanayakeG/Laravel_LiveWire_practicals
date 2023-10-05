<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $counter = 1;

    public function render()
    {
        return view('livewire.counter');
    }

    public function increment()
    {
        $this->counter = $this->counter + 1;
        $this->dispatch('counterUp', $this->counter);
    }

    public function decrement()
    {
        $this->counter = $this->counter - 1;
    }
}
