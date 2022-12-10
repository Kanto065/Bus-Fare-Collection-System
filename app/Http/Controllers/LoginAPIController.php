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
use Carbon\Carbon;
use Mail;
use App\Mail\Email;

class LoginAPIController extends Controller
{
    public function login(Request $request)
    {
        $user = Passenger::where('email', $request->email)->first();
        $busOwner = BusOwner::where('email', $request->email)->first();
        $admin = Admin::where('email', $request->email)->first();

        //return $user;
        // dd($user);

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


        if ($validUser) {
            //return $request->isLoggedIn;
            $Logedin = Token::where('token', $request->isLoggedIn)->first();
            if ($Logedin) {
                return 'logedin!';
            } else {
                //return $validUser;
                $api_token = Str::random(64);
                $token = new Token();
                $token->userid = $validUser->id;
                $token->token = $api_token;
                $token->user_type = $validUser->userType;
                $token->created_at = new DateTime();
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


    public function sendResetLink(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
        ]);
        $user = Passenger::where('email', $request->email)->first();
        $busOwner = BusOwner::where('email', $request->email)->first();
        $admin = Admin::where('email', $request->email)->first();


        if($user)
        {

        $data=[
            'subject'=>'reset password',
            'body'=>'Your Bus fare collection system password can be changed by clicking this link'
        ];
        try{
            Mail::to($request->email)->send(new Email($data));
            return response()->json(['Great check your mail']);
        }
        catch(Exception $th){
            return response()->json['sorry something wrong'];
        }
        }
        if($busOwner)
        {

        $data=[
            'subject'=>'reset password',
            'body'=>'Your Bus fare collection system password can be changed by clicking this link'
        ];
        try{
            Mail::to($request->email)->send(new Email($data));
            return response()->json(['Great check your mail']);
        }
        catch(Exception $th){
            return response()->json['sorry something wrong'];
        }
        }
        if($admin)
        {
        $data=[
            'subject'=>'reset password',
            'body'=>'Your Bus fare collection system password can be changed by clicking this link'
        ];
        try{
            Mail::to($request->email)->send(new Email($data));
            return response()->json(['Great check your mail']);
        }
        catch(Exception $th){
            return response()->json['sorry something wrong'];
        }
        }
        
    }
}