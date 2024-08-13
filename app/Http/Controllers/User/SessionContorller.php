<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SessionContorller extends Controller
{
    
    public function login(){
        return view('staff.session.login');
    }

    public function register(Request $request){
        return view('member.register');
    }

    public function authenticate(Request $request){
        $request->validate([
            'email'=> ['required', 'email'],
            'password'=>['required']
        ]);

        $data = [
            'email' => $request->email ,
            'password'  => $request->password
        ];
        if(Auth::guard('web')->attempt($data)){
            return redirect()->route('staff_dashboard');
        }
        else{
            return redirect()->route('staff_login')->with('error', 'The information provided is 
            incorrect please try again');
        }
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('staff_login')->with('error', 'The information provided is 
            incorrect please try again');
    }

}
