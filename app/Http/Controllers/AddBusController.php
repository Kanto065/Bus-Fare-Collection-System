<?php

namespace App\Http\Controllers;
use App\Models\AddBus;

use Illuminate\Http\Request;

class AddBusController extends Controller
{
    public function busAdd()
    {
        return view('busOwner.addBus');
    }
    public function BusRegisterSubmit(Request $request)
    {
        $validated = $request->validate([
            'bus_name' => 'required',
            'Amount_of_Bus' => 'required',
            'Trade_Licence' => 'required',
            'Route_no' => 'required',
            
        ]);
        $b = new addBus();
        $b->bus_name = $request->bus_name;
        $b->amount_bus = $request->Amount_of_Bus;
        $b->Trade_Licence = $request->Trade_Licence;
        $b->route_no = $request->Route_no;
        $res = $b->save();
        if ($res) {
            return back()->with('success', 'Registered successfuly');
        } else {
            return back()->with('fail', 'registration failed');
        }
    }
}
