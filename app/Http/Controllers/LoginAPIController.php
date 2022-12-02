<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\BusOwner;
use App\Models\Passenger;
use App\Models\Token;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoginAPIController extends Controller
{
    public function login(Request $request)
    {
        $user = Passenger::where('email', $request->email)->where('password', $request->password)->first();
        $busOwner = BusOwner::where('email', $request->email)->where('password', $request->password)->first();
        $admin = Admin::where('email', $request->email)->where('password', $request->password)->first();

        dd($user);

        if ($user || $busOwner || $admin) {
            $api_token = Str::random(64);
            $token = new Token();
            $token->userid = $user->id;
            $token->token = $api_token;
            $token->created_at = new DateTime();
            $token->save();
            return $token;
        }
        return "No user found";
    }
}