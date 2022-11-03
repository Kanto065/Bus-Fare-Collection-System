<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pRegistration;
use App\Models\ownerReg;
use Session;
use Hash;

class RegistrationController extends Controller
{
    public function register()
    {
        return view('pRegistration');
    }
    public function registerSubmit(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required|max:50',
            'password' => 'required|confirmed|min:4',
        ]);
        $p = new pRegistration();
        $p-> first_name =$request->first_name;
        $p-> last_name =$request->last_name;
        $p->email =$request->email;
        $p-> phone =$request->phone;
        $p-> address =$request->address;
        $p-> password =Hash::make($request->password);
        $res=$p->save();
        if($res){
            return back()->with('success','Registered successfuly');
        }
        else{
            return back()->with('fail','registration failed');
        }
    }
    public function oRegister()
    {
        return view('ownerReg');
    }
    public function oRegisterSubmit(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required',
            'owner_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required|max:50',
            'password' => 'required|confirmed|min:4',
        ]);
        $o = new ownerReg();
        $o-> company_name =$request->company_name;
        $o-> owner_name =$request->owner_name;
        $o->email =$request->email;
        $o-> phone =$request->phone;
        $o-> address =$request->address;
        $o-> password =Hash::make($request->password);
        $res=$o->save();
        if($res){
            return back()->with('success','Registered successfuly');
        }
        else{
            return back()->with('fail','registration failed');
        }

    }

    public function loginUser(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user=pRegistration::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect('dashboard');
            }
            else{
                return back()->with('fail','this password is not matched');
            }
        }
        if($user){

        }
        else{
            return back()->with('fail','this email is not registerd');
        }
    }
    public function dashboard(){
        return "Welcome";
    }
}
