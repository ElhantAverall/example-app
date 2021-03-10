<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Consumable;

class PostComponent extends Component
{
    public $selectedName = null, $postId = 3;

    public function render()
    {
        $consumable = Consumable::all();

        return view('component.table', compact('consumable'));
    }

}
