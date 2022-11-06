<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusOwnerController extends Controller
{
    public function busAdd()
    {
        return view('addBus');
    }
}