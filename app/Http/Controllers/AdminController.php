<?php

namespace App\Http\Controllers;

use App\Models\Consumable;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $consumables = Consumable::all();

        return view('admin-panel', compact('consumables'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'price' => 'required|integer',
        ];
        $validateData = $this->validate($request, $rules);

        $consumable = new Consumable;

        $consumable->name = $request->name;
        $consumable->price = $request->price;
        $consumable->save();
        return redirect('/admin-panel');
    }

    public function edit($id)
    {
        $consumables = Consumable::find($id);
        return view('consumable.edit')->with('consumables', $consumables);
    }

    public function destroy($id)
    {
        $consumables = Consumable::find($id);
        $consumables->delete();

        return redirect('/admin-panel');
    }
}
