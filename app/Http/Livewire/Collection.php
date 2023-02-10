<?php

namespace App\Http\Livewire;

use Illuminate\Support\Fluent;
use Livewire\Component;

class Collection extends Component
{
    public $attributes;
    public $ages = [];

    public function mount()
    {
        $this->attributes = ['name'=>'Mds'];

        $this->ages = [1,2,3,4,5,6,7];
    }

    public function getFluentApiProperty()
    {
        $data = new Fluent($this->attributes);
        $data['last_name'] = 'smith';

        $data->lastName('congo')
            ->age(25)
            ->isAdmin()
            ->isModerator(false);

//        return $data->name;
        return $data->toJson();
        return $data->toArray()['name'];
        return $data->getAttributes()['name'];
        return $data->get('name', 'Jack');
    }

    public function render()
    {
        return view('livewire.collection')->layout('layouts.app');
    }
}
