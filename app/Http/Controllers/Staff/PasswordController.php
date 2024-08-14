<?php

namespace App\Http\Controllers\Staff;

use App\Helpers\Passwords\PasswordHelper;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
    public function forgot_password_view(){
        return view('staff.password.forgot_password_view');

    }

    public function forgot_password(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
        ]);
        ## return to dash if logged in
        $staff = Staff::where('email', $request->email)->first();
        if(!$staff){
            return redirect()->back()->with('error', 'Email not found');
        }
        PasswordHelper::send_reset_password_mail($staff, $request, 'staff/reset-password');;
        return redirect()->back()->with('suceess', 'We sent a password reset link to your email.
         Please check in the spam folder iof you do not find it');

    }

    public function reset_password_view($token, $email){

        $staff = Staff::where('remember_token', $token)->where('email', $email)->first();
        if(!$staff){
            return redirect()->route('staff_login')->with('error', 'Email or token invalid');
        }
        return view('staff.password.reset_password_view', compact('token', 'email'));

    }
    
    public function reset_password(Request $request, $token, $email){
        $request->validate([
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password'],
        ]);
        $staff = Staff::where('remember_token', $request->token)->where('email', $request->email)->first();
        $staff->password = Hash::make($request->password);
        $staff->remember_token = '';
        $staff->update();
        return redirect()->route('staff_login')->with('success', 'Password Reset was successfull. You can now login');

    }
}
