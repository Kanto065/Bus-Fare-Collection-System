<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use App\Models\route;

use Illuminate\Http\Request;

class AdminApiController extends Controller
{
    public function AddRouteSubmitApi(Request $request)
    {

        $b = new route();
        $b->route_no = $request->route_no;
        $b->route_name = $request->route_name;
        $res = $b->save();
        if ($res) {
            return "add success";
        } else {
            return "add failed";
        }
    }

    public function PassengerList()
    {
        return Passenger::all();
    }

    public function AssignRfid(Request $request)
    {
        $user = Passenger::where('id', $request->id)->first();
        if ($user) {
            $user->rfid = $request->rfid;
            $res = $user->save();
            if ($res) {
                return "assign success";
            }
        } else {
            return "user not found";
        }
    }
}