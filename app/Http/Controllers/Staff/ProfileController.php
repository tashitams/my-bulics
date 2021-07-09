<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = auth()->user();

        return inertia('Staff/Profile', [
            'user' => [
                'name' => $user->name,
                'designation' => $user->designation,
                'qualification' => $user->qualification,
                'phone_no' => $user->phone_no,
                'employee_id' => $user->employee_id,
                'cid_no' => $user->cid_no,
                'address' => $user->address,
                'joining_date' => $user->joining_date,
                'school_role' => $user->school_role,
                'profile_pic' => $user->profile_pic,
            ],
        ]);
    }


    public function updateProfile(Request $request)
    {
        $userId = auth()->id();
        $request->validate([
            'name' => 'required|max:30',
            'designation' => 'required|max:30',
            'employee_id' => 'required|max:20|unique:users,employee_id,'.$userId,
            'cid_no' => 'required|digits:11|unique:users,cid_no,'.$userId,
            'phone_no' => 'required|digits:8|unique:users,phone_no,'.$userId,
            'qualification' => 'required|max:30',
            'address' => 'required|max:30',
            'joining_date' => 'required|date',
            'school_role' => 'nullable|max:200',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        if ($request->hasFile('profile_pic')) {
            $extension = $request->profile_pic->getClientOriginalExtension();
            $fileName = auth()->user()->employee_id.'.'.$extension;

            if (auth()->user()->profile_pic != 'default.png') {
                Storage::delete('/public/img/' . auth()->user()->profile_pic);
            }

            $request->profile_pic->storeAs('img', $fileName, 'public');
            auth()->user()->update(['profile_pic' => $fileName]);
        }

        auth()->user()->update($request->except('profile_pic'));

        return redirect()->route('staff.profile')->with('message', __('message.profile.update'));
    }


    public function resetPassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|password|min:8',
            'password' => 'required|confirmed|min:8',
        ]);

        auth()->user()->update(['password' => $request->password]);
        return redirect()->route('staff.dashboard')->with('message', __('passwords.reset'));
    }
}
