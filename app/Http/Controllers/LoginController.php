<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Passenger;
use App\Models\BusOwner;


class LoginController extends Controller
{
    public function loginUser(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = Passenger::where('email', '=', $request->email)->first();
        $busOwner = BusOwner::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'this password is not matched');
            }
        }
        if ($busOwner) {
            if (Hash::check($request->password, $busOwner->password)) {
                $request->session()->put('loginId', $busOwner->id);
                return redirect('ownerdash');
            } else {
                return back()->with('fail', 'this password is not matched');
            }
        } else {
            return back()->with('fail', 'this email is not matched');
        }
    }

    public function dashboard()
    {
        return view('passenger.passengerDashboard');
    }
    public function ownerdash()
    {
        return view('busOwner.ownerDashboard');
    }
}