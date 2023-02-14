<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Livewire;

class Events extends Component
{
    public $modalData=  [
        'id' => 1, 'name' => 'modal-1'
    ];

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

    public function counterUp($counter)
    {
        $this->counterFromCount = $counter;
        //dd("Event Fired"); dd s not working, but actually event is fired
    }

    public function openModal()
    {
        $this->modalData = [
            'id' => 1, 'name' => 'modal-2'
        ];

        $this->dispatchBrowserEvent('showModal', $this->modalData);
    }

    public function render()
    {
        return view('livewire.events');
    }
}
