<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\BusOwner;
use App\Models\Passenger;
use App\Models\Token;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginAPIController extends Controller
{
    public function login(Request $request)
    {
        $user = Passenger::where('email', $request->email)->first();
        $busOwner = BusOwner::where('email', $request->email)->first();
        $admin = Admin::where('email', $request->email)->first();

        //return $user;
        //dd($user);

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                //$request->session()->put('loginId', $user->id);
                //return redirect('dashboard');
                $validUser = $user;
                $validUser["userType"] = "passenger";
            } else {
                return 'this password is not matched';
            }
        }
        //return $validUser;

        if ($busOwner) {
            if (Hash::check($request->password, $busOwner->password)) {
                $validUser = $user;
                $validUser["userType"] = "busOwner";
            } else {
                return 'this password is not matched';
            }
        }
        if ($admin) {
            if ($request->password = $admin->password) {
                $validUser = $user;
                $validUser["userType"] = "admin";
            } else {
                return 'this password is not matched';
            }
        } else {
            return "No user found";
        }

        if ($validUser) {
            //return $request->isLoggedIn;
            $Logedin = Token::where('token', $request->isLoggedIn)->first();
            if ($Logedin) {
                return 'logedin!';
            } else {
                $api_token = Str::random(64);
                $token = new Token();
                $token->userid = $validUser->id;
                $token->token = $api_token;
                $token->user_type = $validUser->userType;
                $token->created_at = new DateTime();
                $token->expired_at = "";
                $token->save();
                return $token;
            }
        }
    }
    public function  logout(Request $req)
    {

        $token = Token::where('token', $req->token)->first();
        if ($token) {
            // $token->expired_at = new DateTime();
            $token->delete();
            return "deleted";
        }
        return "not found";
    }
}