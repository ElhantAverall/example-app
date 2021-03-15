<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Consumable;

class ModalComponent extends Component
{
    public $selectedName = null;

    public function render()
    {
        $consumable = Consumable::all();

        return view('component.modal-window', compact('consumable'));
    }
}
