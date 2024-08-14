<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function dashboard( Request $request){
       return view('staff.dashboard');
    }

    public function register(Request $request){

    }
}
