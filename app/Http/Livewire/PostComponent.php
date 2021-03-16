<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Report;

class PostComponent extends Component
{

    public function render()
    {
        $reports = Report::all();

        return view('component.table', compact('reports'));
    }
}
