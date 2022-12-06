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

        // return $admin;
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
        // return $validUser;

        else if ($busOwner) {
            if (Hash::check($request->password, $busOwner->password)) {
                $validUser = $user;
                $validUser["userType"] = "busOwner";
                
            } else {
                return 'this password is not matched';
            }
        } else if ($admin) {
            if ($request->password = $admin->password) {
                //return $admin;
                $validUser = $admin;
                $validUser["userType"] = "admin";
            } else {
                return 'this password is not matched';
            }
        } else {
            return "No user found";
        }

        return $validUser;

        if ($validUser) {
            //return $request->isLoggedIn;
            
            $Logedin = Token::where('token', $request->isLoggedIn)->first();
            if ($Logedin) {
                return 'logedin!';
                
            } else {
                // return $validUser;
                $api_token = Str::random(64);
                $token = new Token();
                $token->userid = $validUser->id;
                $token->token = $api_token;
                $token->user_type = $validUser->userType;
                $token->created_at = $dateTime;
                //$dateTime2 = $dateTime->modify('+10 minutes');
                //$token->expired_at = $dateTime->modify('+10 minutes');;
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