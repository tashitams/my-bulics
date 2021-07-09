<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Esp;

class StaffController extends Controller
{
    public function teacherIndex()
    {
        return inertia('Staff/Teacher/Index', [
            'users' => DB::table('users')->select('id', 'name', 'phone_no', 'profile_pic')
            ->where('user_role', 'Teacher')
            ->orWhere('user_role', 'Principal')
            ->orderBy('name')
            ->get()
        ]);
    }


    public function teacherShow(User $user)
    {
        return inertia('Staff/Teacher/Profile', [
            'user' => [
                'name' => $user->name,
                'designation' => $user->designation,
                'employee_id' => $user->employee_id,
                'cid_no' => $user->cid_no,
                'email' => $user->email,
                'phone_no' => $user->phone_no,
                'qualification' => $user->qualification,
                'address' => $user->address,
                'joining_date' => $user->joining_date,
                'school_role' => $user->school_role,
                'profile_pic' => $user->profile_pic,
            ],
        ]);
    }


    public function staffIndex()
    {
        return inertia('Staff/Staff/Index', [
            'users' => DB::table('users')->select('id', 'name', 'phone_no', 'profile_pic')
            ->where('user_role', 'Staff')
            ->orderBy('name')
            ->get()
        ]);
    }


    public function staffShow(User $user)
    {
        return inertia('Staff/Staff/Profile', [
            'user' => [
                'name' => $user->name,
                'designation' => $user->designation,
                'employee_id' => $user->employee_id,
                'cid_no' => $user->cid_no,
                'email' => $user->email,
                'phone_no' => $user->phone_no,
                'qualification' => $user->qualification,
                'address' => $user->address,
                'joining_date' => $user->joining_date,
                'school_role' => $user->school_role,
                'profile_pic' => $user->profile_pic,
            ],
        ]);
    }


    public function espIndex()
    {
        return inertia('Staff/Esp/Index', [
            'esps' => DB::table('esps')->select('id', 'name', 'phone_no', 'profile_pic')
            ->orderBy('name')
            ->get()
        ]);
    }


    public function espShow(Esp $esp)
    {
        return inertia('Staff/Esp/Profile', [
            'user' => [
                'name' => $esp->name,
                'designation' => $esp->designation,
                'cid_no' => $esp->cid_no,
                'phone_no' => $esp->phone_no,
                'address' => $esp->address,
                'joining_date' => $esp->joining_date,
                'profile_pic' => $esp->profile_pic,
            ],
        ]);
    }

}
