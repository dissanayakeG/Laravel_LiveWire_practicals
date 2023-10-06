<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class FormSubmit extends Component
{
    public $title = '';
    public $content = '';
    public $data = [];
    public $options;
    public $selectedOption;
    public $todo = '';

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

    #[Computed]
    public function formData()
    {
        return collect($this->data);
    }

    #[Computed]
    public function users()
    {
        return json_decode(file_get_contents(base_path('data.json')), true);
    }

    public function save()
    {
        if ($this->title) {
            $this->data = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        } else {
            $this->data = [];
        }
    }

    public function modelable()
    {
        dd($this->all());
    }

    public function render()
    {
        return view('livewire.form-submit');
    }
}
