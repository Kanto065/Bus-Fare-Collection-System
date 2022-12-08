<?php

namespace App\Http\Controllers;

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

    
}