<?php

namespace App\Http\Controllers;
use App\Models\route;
use App\Models\AddBus;

use Illuminate\Http\Request;

class BusOwnerController extends Controller
{
    public function ownerdash(){
        return view('busOwner.ownerDashboard');
    }
    public function viewRoute()
    {
        return view('busOwner.routeList')->with('routeListArr',route::all());
    }
    public function viewBus()
    {
        return view('busOwner.busList')->with('busListArr',AddBus::all());
    }
    public function delete(Request $request)
    {
        $bus = AddBus::where('id', $request->id)->first();
        $bus->delete();
        return redirect()->route('busList');
    }
    public function update(Request $request)
    {
        $bus = AddBus::where('id', $request->id)->first();
        return view('busOwner.editBus')->with('bus', $bus);
    }
    public function BusUpdateSubmitted(Request $request){
        $b = AddBus::where('id', $request->id)->first();
        $b->bus_name = $request->bus_name;
        $b->amount_bus = $request->Amount_of_Bus;
        $b->Trade_Licence = $request->Trade_Licence;
        $b->route_no = $request->Route_no;
        $res = $b->save();
        if ($res) {
            return back()->with('success', 'update successfuly');
        } else {
            return back()->with('fail', 'update failed');
        }

    }
}