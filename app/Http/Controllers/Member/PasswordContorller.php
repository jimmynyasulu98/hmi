<?php

namespace App\Http\Controllers\member;

use App\Mail\ResetPasswordEmail;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PasswordContorller extends Controller
{
    public function forgot_password_view(){
        return view('member.password.forgot_password_view');

    }
    public function forgot_password(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
        ]);
        ## return to dash if logged in
        $member = Member::where('email', $request->email)->first();
        if(!$member){
            return redirect()->back()->with('error', 'Email not found');
        }
        $token = hash('sha256',time());
        $member->remember_token = $token;
        $member->update();
        $reset_link = url('member/reset-password/'.$token.'/'.$request->email);
        $subject = 'Reset Password';
        $message = 'To reset password, please click on the link below:<br>';
        $message .= "<a href='".$reset_link."'>Click here</a>";
        
        Mail::to($request->email)->send(new ResetPasswordEmail($subject, $message));
        return redirect()->back()->with('suceess', 'We sent a password reset link to your email.
         Please check in the spam folder iof you do not find it');

    }

    public function reset_password_view($token, $email){

        $member = Member::where('remember_token', $token)->where('email', $email)->first();
        if(!$member){
            return redirect()->route('member_login')->with('error', 'Email or token invalid');
        }
        return view('member.password.reset_password_view', compact('token', 'email'));

    }

    public function reset_password(Request $request, $token, $email){
        $request->validate([
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password'],
        ]);
        $member = Member::where('remember_token', $request->token)->where('email', $request->email)->first();
        $member->password = Hash::make($request->password);
        $member->remember_token = '';
        $member->update();
        return redirect()->route('member_login')->with('success', 'Password Reset was successfull. You can now login');

    }
}
