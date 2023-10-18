<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Computed;

class DynamicInputs extends Component
{
    public $formData = [];

    public function mount()
    {
        $this->formData = [
            [
                'id' => 1,
                'name' => 'sam',
                'address' => 'new york',
                'age' => 23
            ]
        ];
    }

    #[Computed]
    public function formData()
    {
        return $this->formData;
    }

    public function rules()
    {
        $rules = [];

        foreach ($this->formData as $index => $item) {
            $rules["formData.{$index}.name"] = 'required|string|max:255';
            $rules["formData.{$index}.address"] = 'required|string|max:255';
            $rules["formData.{$index}.age"] = 'required|integer|min:0';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'formData.*.name.required' => 'The name field is required.',
            'formData.*.name.string' => 'The name must be a string.',
            'formData.*.name.max' => 'The name may not be greater than 255 characters.',
            'formData.*.address.required' => 'The address field is required.',
            'formData.*.address.string' => 'The address must be a string.',
            'formData.*.address.max' => 'The address may not be greater than 255 characters.',
            'formData.*.age.required' => 'The age field is required.',
            'formData.*.age.integer' => 'The age must be an integer.',
            'formData.*.age.min' => 'The age must be at least 0.',
        ];
    }

    public function submit()
    {
        $validated = $this->validate();
        // dd($validated);
    }

    public function addRow()
    {
        array_push($this->formData, [
            'id' => count($this->formData) + 1,
            'name' => '',
            'address' => '',
            'age' => ''
        ]);
    }

    public function deleteRow($index)
    {
        if (isset($this->formData[$index])) {
            unset($this->formData[$index]);
        }
    }


    public function render()
    {
        return view('livewire.dynamic-inputs');
    }
}
