<?php
namespace App\Helpers\Passwords;

use App\Mail\ResetPasswordEmail;
use Illuminate\Support\Facades\Mail;

class PasswordHelper{

    public static function send_reset_password_mail($user, $request, $root_url='staff/reset-password'){
 
        $token = hash('sha256',time());
        $user->remember_token = $token;
        $user->update();

        $reset_link = url($root_url.'/'.$token.'/'.$request->email);
        $subject = 'Reset Password';
        $message = 'To reset password, please click on the link below:<br>';
        $message .= "<a href='".$reset_link."'>Click here</a>";

        Mail::to($request->email)->send(new ResetPasswordEmail($subject, $message));

    }
}