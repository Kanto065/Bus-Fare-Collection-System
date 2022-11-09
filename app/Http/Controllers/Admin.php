<?php

namespace App\Http\Controllers;
use App\Models\route;
use App\Models\AddBus;
use Illuminate\Http\Request;

class Admin extends Controller
{
    public function viewRoute()
    {
        return view('admin.routeList')->with('routeListArr',route::all());
    }
    public function viewBus()
    {
        return view('admin.busList')->with('busListArr',AddBus::all());
    }
}
