<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $login_with = filter_var($request->username, FILTER_VALIDATE_EMAIL ) ? 'email' : 'phone_no';

        $request->merge([$login_with => $request->username]);
        
        if(auth()->guard('web')->attempt($request->only($login_with, 'password'))) {

            $request->session()->regenerate();

            return redirect()->intended(route('staff.dashboard'));
        }

        return back()->with('message', __('auth.failed'));       
    }


    public function logout(Request $request)
    {
        auth()->guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('staff.login')->with('message', __('auth.logout'));
    }
}
