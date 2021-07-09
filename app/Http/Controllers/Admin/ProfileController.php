<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function resetPassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|password|min:8',
            'password' => 'required|confirmed|min:8',
        ]);

        auth()->user()->update(['password' => $request->password]);
        return redirect()->route('admin.dashboard')->with('message', __('passwords.reset'));
    }
}
