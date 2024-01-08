<?php

namespace App\Livewire;

use Livewire\Component;

class MultiSelect extends Component
{
    public $allOptions = [
        ["id" => 1, "name" => "some 1"],
        ["id" => 2, "name" => "some 2"],
        ["id" => 3, "name" => "some 3"],
        ["id" => 4, "name" => "some 4"],
        ["id" => 5, "name" => "some 5"],
        ["id" => 6, "name" => "some 6"]
    ];

    public $selectedOptions = [
        2, 6
    ];

    public function getSelectedOptionNames()
    {
        return collect($this->selectedOptions)->map(function ($optionId) {
            return collect($this->allOptions)->where('id', $optionId)->pluck('name')->first();
        })->implode(', ');
    }

    public function submit()
    {
        dd($this->selectedOptionNames);
    }


    public function render()
    {
        return view('livewire.multi-select');
    }
}
