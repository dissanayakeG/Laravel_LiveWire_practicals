<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Modelable;

class TodoInput extends Component
{
    #[Modelable] 
    public $value = '';
 
    public function render()
    {
        return view('livewire.todo-input');
    }
}
