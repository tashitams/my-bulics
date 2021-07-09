<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PasswordResetRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ForgotPasswordController extends Controller
{
    public function forgetPassword(Request $request) 
    {
        $request->validate(['email' => 'required|email|exists:users']);
        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => now()
        ]);

        Mail::send('email.reset-password-link', ['token' => $token], function($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

         return redirect('/')->with('message', __('passwords.sent')); 
    }


    public function showResetPasswordForm($token) 
    { 
        return inertia('Auth/ResetPassword', ['token' => $token]);
    }


    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $isValid = DB::table('password_resets')->where([
            'email' => $request->email, 
            'token' => $request->token
        ])->first();

        if($isValid) {
            DB::table('users')
            ->where('email', $request->email)
            ->update(['password' => bcrypt($request->password)]);

            DB::table('password_resets')->where(['email'=> $request->email])->delete();
            return redirect('/')->with('message', __('passwords.reset'));
        }

        return back()->with('message', __('passwords.token'));        
    }
}
