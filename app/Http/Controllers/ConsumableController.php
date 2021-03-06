<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Consumable;
use Illuminate\Http\Request;

class ConsumableController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        $consumable = Consumable::all()
            ->where('allow', 1);

        // dd($consumable);
        return view('consumable', compact('consumable', 'reports'));
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
        return redirect('/consumable');
    }

    public function edit($report)
    {

        $consumable = Consumable::all()
            ->where('allow', 1);
        $report = Report::find($report);

        return view('edit-consumable', compact('consumable', 'report'));
    }

    public function destroy($id)
    {
        $reports = Report::find($id);
        $reports->delete();

        return redirect('/consumable');
    }

    public function update(Request $request, $report)
    {
        $update = $request->all();

        $report = Report::find($report);

        $report->name = $request->name;
        $report->price = $request->price;
        $report->count = $request->count;
        $report->save();


        return redirect('/consumable');
    }
}
