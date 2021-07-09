<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function username()
    {
        return 'username';
    }
    

    public function authenticate(Request $request)
    {
        $request->validate([
           'username' => 'required',
           'password' => 'required|min:6',
        ]);

        if(auth()->guard('admin')->attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        //Authentication failed...
        return back()->with('message', __('auth.failed'));       
    }


    public function adminLogout(Request $request)
    {
        auth()->guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('message', __('auth.logout'));
    }
}
