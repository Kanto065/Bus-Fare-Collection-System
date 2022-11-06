<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Passenger;
use App\Models\BusOwner;
use Session;
//use Hash;


class RegistrationController extends Controller
{
    public function passengerRegister()
    {
        return view('passenger.passengerRegistration');
    }
    public function PassengerRegisterSubmit(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required|max:50',
            'password' => 'required|confirmed|min:4',
        ]);
        $p = new Passenger();
        $p->first_name = $request->first_name;
        $p->last_name = $request->last_name;
        $p->email = $request->email;
        $p->phone = $request->phone;
        $p->address = $request->address;
        $p->password = Hash::make($request->password);
        $p->balance = 0;
        $res = $p->save();
        if ($res) {
            return back()->with('success', 'Registered successfuly');
        } else {
            return back()->with('fail', 'registration failed');
        }
    }
    public function ownerRegister()
    {
        return view('busOwner.ownerRegistration');
    }
    public function ownerRegisterSubmit(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required',
            'owner_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required|max:50',
            'password' => 'required|confirmed|min:4',
        ]);
        $o = new BusOwner();
        $o->company_name = $request->company_name;
        $o->owner_name = $request->owner_name;
        $o->email = $request->email;
        $o->phone = $request->phone;
        $o->address = $request->address;
        $o->password = Hash::make($request->password);
        $o->balance = 0;
        $res = $o->save();
        if ($res) {
            return back()->with('success', 'Registered successfuly');
        } else {
            return back()->with('fail', 'registration failed');
        }
    }
}