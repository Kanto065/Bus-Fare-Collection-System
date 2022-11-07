<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusOwnerController extends Controller
{
    public function busAdd()
    {
        return view('busOwner.addBus');
    }
    public function viewRoute()
    {
        return view('busOwner.routeList');
    }
}