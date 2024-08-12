<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberContorller extends Controller
{
    public function login( Request $request){
        return view('member.login');
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
        if(Auth::guard('member')->attempt($data)){
            return redirect()->route('member_dashboard');
        }
        else{
            return redirect()->route('member_login')->with('error', 'The information provided is 
            incorrect please try again');
        }
    }

    public function dashboard(){
        return view('member.dashboard');
    }
}
