<?php

namespace App\Livewire;

use Livewire\Component;

class AlpineTest extends Component
{
    public $val;
    public function render()
    {
        return view('livewire.alpine-test');
    }

    public function abc(){
        dump($this->val);
    }

    public function increment(){
        dump('calling');
    }
}
