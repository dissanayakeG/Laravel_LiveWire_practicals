<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Events extends Component
{
    public $counterFromCount;
    //method 1 key != method name
    //protected $listeners = ['counterUp' => 'incrementPostCount'];

    //method 2 key != method name and dynamically bind
//    protected function getListeners()
//    {
//        return ['counterUp' => 'incrementPostCount'];
//    }

    //method 3 key == method name
    protected $listeners = ['counterUp'];

    public function counterUp($counter){
        $this->counterFromCount = $counter;
        //dd("Event Fired"); dd s not working, but actually event is fired
    }

    public function render()
    {
        return view('livewire.events');
    }
}
