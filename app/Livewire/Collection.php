<?php

namespace App\Livewire;

use Illuminate\Support\Fluent;
use Livewire\Component;

class Collection extends Component
{
    public $formData;
    public $ages = [];
    public $technologies = [];
    public $selected = [];

    public function mount()
    {
        $this->formData = ['name' => 'Mds'];
        $this->ages = [1, 2, 3, 4, 5, 6, 7];
        $this->technologies = ["VueJs", "ReactJs", "AngularJs", "NodeJs", "ExpressJs"];
    }

    public function getFluentApiProperty()
    {
        $data = new Fluent($this->formData);
        $data['last_name'] = 'smith';

        $data->lastName('congo')
            ->age(25)
            ->isAdmin()
            ->isModerator(false);

        //return $data->name;
        return $data->toJson();
        return $data->toArray()['name'];
        return $data->getAttributes()['name'];
        return $data->get('name', 'Jack');
    }

    public function render()
    {
        return view('livewire.collection');
    }
}
