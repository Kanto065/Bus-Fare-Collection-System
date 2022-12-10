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
        return view('passenger.passengerDashboard')->with('user', $user);
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
    public function showResetForm(Request $request){
        return view('reset-password');
    }
    public function passwordUpdateSubmit(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
        ]);
        $user = Passenger::where('email', $request->email)->first();
        $busOwner = BusOwner::where('email', $request->email)->first();
        $admin = Admin::where('email', $request->email)->first();
        if($user){
            $user = Passenger::where('email', $request->email)->first();
            $user->password = $request->password;
            $user->save();
            return redirect()->route('log.in');
        }
        if($busOwner){
            $busOwner = BusOwner::where('email', $request->email)->first();
            $busOwner->password = $request->password;
            $busOwner->save();
            return redirect()->route('log.in');
        }
        if($admin){
            $admin = Admin::where('email', $request->email)->first();
            $admin->password = $request->password;
            $admin->save();
            return redirect()->route('log.in');
        }
        else{
            return redirect()->route('log.in');
        }

    }

}