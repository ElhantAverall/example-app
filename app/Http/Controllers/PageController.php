<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('livewire.counter');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'price' => 'required|integer',
            'count' => 'required|integer|min:1'
        ];
        $validateData = $this->validate($request, $rules);

        $report = new Report;

        $report->name = $request->name;
        $report->price = $request->price;
        $report->count = $request->count;
        $report->save();
        return 'Отправлено в reports';
    }
}
