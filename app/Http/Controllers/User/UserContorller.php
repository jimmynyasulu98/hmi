<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserContorller extends Controller
{
    public function dashboard( Request $request){
       return view('staff.dashboard');
    }

    public function register(Request $request){

    }
}
