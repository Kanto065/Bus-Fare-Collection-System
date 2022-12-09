<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationApiController extends Controller
{
    public function passengerRegister(Request $request)
    {
        $user = Passenger::where('email', $request->email)->first();
        if ($user) {
            return "user already exist";
        } else {
            $newPassenger = new Passenger();
            $newPassenger->first_name = $request->firstName;
            $newPassenger->last_name = $request->lastName;
            $newPassenger->email = $request->email;
            $newPassenger->phone = $request->phone;
            $newPassenger->address = $request->address;
            $newPassenger->password = Hash::make($request->password);
            $newPassenger->balance = 100;
            //$newPassenger->rfid = "";
            $response = $newPassenger->save();
            if ($response) {
                return "registration success";
            } else {
                return "registration failed";
            }
        }
    }

    public function busOwnerRegister(Request $req)
    {
        # code...
    }
}