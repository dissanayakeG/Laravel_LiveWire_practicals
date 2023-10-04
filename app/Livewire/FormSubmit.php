<?php

namespace App\Livewire;

use Livewire\Component;

class FormSubmit extends Component
{
    public $title = '';
    public $content = '';
    public $data = [];
    public $options;
    public $selectedOption;
    public $users;

    public function mount()
    {
        $this->options = [
            ['id' => 'SL', 'name' => 'Sri Lanka'],
            ['id' => 'UK', 'name' => 'United Kingdom'],
            ['id' => 'USA', 'name' => 'United States'],
            ['id' => 'UAE', 'name' => 'United Arab Emirates'],
            ['id' => 'NZ', 'name' => 'New Zealand'],
            ['id' => 'AUS', 'name' => 'Australia'],
        ];
    }

    public function save()
    {
        if($this->title){
            $this->data = [1,2,3,4,5,6,7,8,9,10];
            $this->users = json_decode(file_get_contents(base_path('data.json')), true);

        }else{
            $this->data = [];
        }
    }

    public function getFormDataProperty(){
        return collect($this->data);
    }

    public function render()
    {
        return view('livewire.form-submit')->layout('layouts.app');
    }
}
