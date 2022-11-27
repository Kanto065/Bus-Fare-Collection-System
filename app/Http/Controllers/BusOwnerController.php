<?php

namespace App\Http\Controllers;

use App\Models\route;
use App\Models\AddBus;

use Illuminate\Http\Request;

class BusOwnerController extends Controller
{
    public function ownerdash()
    {
        return view('busOwner.ownerDashboard');
    }
    public function viewRoute()
    {
        return view('busOwner.routeList')->with('routeListArr', route::all());
    }
    public function viewBus()
    {
        return view('busOwner.busList')->with('busListArr', AddBus::all());
    }
    public function viewBusApi()
    {
        return AddBus::all();
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
    public function BusUpdateSubmitted(Request $request)
    {
        $bus = AddBus::where('id', $request->id)->first();
        $bus->bus_name = $request->bus_name;
        $bus->amount_bus = $request->Amount_of_Bus;
        $bus->Trade_Licence = $request->Trade_Licence;
        $bus->route_no = $request->Route_no;
        $bus->save();
        return view('busOwner.ownerDashboard');
    }
}