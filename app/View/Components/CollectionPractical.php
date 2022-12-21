<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CollectionPractical extends Component
{
    public function tapFunction()
    {
        $items = [
            ['name' => 'David Charleston', 'member' => 1, 'active' => 1],
            ['name' => 'Blain Charleston', 'member' => 0, 'active' => 0],
            ['name' => 'Megan Tarash', 'member' => 1, 'active' => 1],
            ['name' => 'Jonathan Phaedrus', 'member' => 1, 'active' => 1],
            ['name' => 'Paul Jackson', 'member' => 0, 'active' => 1]
        ];
        return collect($items)
            ->where('active', 1)
            ->tap(function ($collection) {
                return var_dump($collection->pluck('name'));
            })
            ->where('member', 1)
            ->tap(function ($collection) {
                return var_dump($collection->pluck('name'));
            });
    }

    public function render()
    {
        return view('components.collection-practical');
    }
}
