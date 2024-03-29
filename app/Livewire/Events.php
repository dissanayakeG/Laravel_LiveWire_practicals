<?php

namespace App\Livewire;

use Livewire\Component;

class Events extends Component
{
    public $quantity=0;
    public $modalData =  [
        'id' => 1, 'name' => 'modal-1'
    ];

    public function openModal()
    {
        $this->modalData = [
            'id' => 1, 'name' => 'New name',
        ];

        $this->dispatch('showModal', $this->modalData);
    }

    public function render()
    {
        return view('livewire.events');
    }
}
