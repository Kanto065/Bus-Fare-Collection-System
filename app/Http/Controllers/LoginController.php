<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\storeLogin;
use App\Models\Passenger;
use App\Models\BusOwner;
use Carbon\Carbon;
// use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Facades\Session;
// use session;
use Mail;
use App\Mail\Email;
use App\Models\Admin;


class LoginController extends Controller
{
    public function store(StoreLogin $request)
    {
        //
    }
    public function loginUser(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = Passenger::where('email', $request->email)->first();
        $busOwner = BusOwner::where('email', $request->email)->first();
        $admin = Admin::where('email', $request->email)->first();
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
        }
        if ($admin) {
            if ($request->password = $admin->password) {
                $request->session()->put('loginId', $admin->id);
                return redirect('admin');
            } else {
                return back()->with('fail', 'this password is not matched');
            }
        } else {
            return back()->with('fail', 'this email is not matched');
        }
    }

    public function dashboard()
    {
        $activeUser = session()->get('loginId');
        $user = Passenger::where('id', $activeUser)->first();
        return view('passenger.passengerDashboard')->with('user',$user);
    }
    public function ownerdash()
    {
        return view('busOwner.ownerDashboard');
    }
    public function admin()
    {
        return view('admin.admin');
    }
    public function LogOut()
    {
        session()->forget('loginId');
        return redirect()->route('log.in');
    }

    public function showForgetForm()
    {
        return view('forgot');
    }
    public function sendResetLink(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
        ]);
        $user = Passenger::where('email', $request->email)->first();
        $busOwner = BusOwner::where('email', $request->email)->first();
        $admin = Admin::where('email', $request->email)->first();

        $token = \Str::random(64);
        \DB::table('password_resets')->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at'=>Carbon::now(),
        ]);

        $action_link = route('reset-password-form',['token'=>$token,'email'=>$request->email]);
        $body = "we are recived a request to reset the password for <b>Bus Fare Collection System </b> account associated with ".$request->email.
        ". You can reset your passwprd by clicking the link below";
        \Mail::send('email-forgot',['action_link'=>$action_link,'body'=>$body],function($messege) use ($request){
            $messege->form('admin@gmail.com','Bus Fare Collection System');
            $messege->to($request->email,'Sazzad')
                    ->subject('Reset Password');
        });

        return back()->with('success','We have e-mailed your password reset link!');
    }
}