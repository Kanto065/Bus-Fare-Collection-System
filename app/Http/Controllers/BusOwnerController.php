<?php

namespace App\Http\Controllers;
use App\Models\route;

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
}