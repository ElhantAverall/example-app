<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $all = 'Vlad';
    public function render()
    {
        return view('livewire.counter');
    }
}
