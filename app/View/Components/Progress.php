<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Progress extends Component
{
    protected $steps;

    public function steps()
    {
        return $this->steps ??= collect([
            'Trip Details' => 'quote.create',
            'Medical Check' => 'quote.medical',
            'Select Policy' => 'quote.select',
            'Select Upgrades' => 'quote.upgrade',
            'Your Details' => 'quote.details',
            'Pay' => 'quote.pay',
        ]);
    }

    public function render()
    {
        return view('components.progress');
    }
}
