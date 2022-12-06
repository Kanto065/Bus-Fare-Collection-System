<?php

namespace App\Http\Controllers;

use App\Models\AddBus;

use Illuminate\Http\Request;

class BusOwnerApiController extends Controller
{
    //
    public function AddBusSubmitApi(Request $request)
    {

        $b = new AddBus();
        $b->bus_name = $request->bus_name;
        $b->amount_bus = $request->Amount_of_Bus;
        $b->Trade_Licence = $request->Trade_Licence;
        $b->route_no = $request->Route_no;
        $res = $b->save();
        if ($res) {
            return "add bus success";
        } else {
            return "add bus failed";
        }
    }
}