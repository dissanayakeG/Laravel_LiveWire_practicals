<?php

namespace App\View\Components;

use Illuminate\View\Component;

class details extends Component
{
    public $abc = "";
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($abc)
    {
        $this->abc = "aaaaaa";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.details');
    }
}
