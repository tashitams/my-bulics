<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Facades\Excel;

class StaffController extends Controller
{
    public function index()
    {
        return inertia('Admin/Staff/Index', [
            'users' => DB::table('users')->select('id', 'name', 'profile_pic')
            ->orderBy('name')
            ->paginate(10)
        ]);
    }


    public function store()
    {
        User::create(
            Request::validate([
                'name' => 'required|max:30',
                'designation' => 'required|max:30',
                'email' => 'required|email|unique:users',
                'employee_id' => 'required|max:30|unique:users',
                'cid_no' => 'required|digits:11|unique:users',
                'phone_no' => 'required|digits:8|unique:users',
                'qualification' => 'required|max:30',
                'address' => 'required|max:30',
                'joining_date' => 'required|date',
                'password' => 'required',
                'user_role' => 'required',
            ])
        );

        return redirect()->route('admin.staff.index')->with('message', __('message.user.store'));
    }


    public function edit(User $user)
    {
        return inertia('Admin/Staff/Edit', [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'designation' => $user->designation,
                'email' => $user->email,
                'phone_no' => $user->phone_no,
                'employee_id' => $user->employee_id,
                'cid_no' => $user->cid_no,
                'address' => $user->address,
                'qualification' => $user->qualification,
                'joining_date' => $user->joining_date,
                'user_role' => $user->user_role,
            ]
        ]);
    }


    public function update(User $user)
    {
        $user->update(
            Request::validate([
                'name' => 'required|max:30',
                'designation' => 'required|max:30',
                'email' => 'required|email|unique:users,email,'.$user->id,
                'employee_id' => 'required|max:20|unique:users,employee_id,'.$user->id,
                'cid_no' => 'required|digits:11|unique:users,cid_no,'.$user->id,
                'phone_no' => 'required|digits:8|unique:users,phone_no,'.$user->id,
                'qualification' => 'required|max:30',
                'address' => 'required|max:30',
                'joining_date' => 'required|date',
                'user_role' => 'required',
            ])
        );

        return redirect()->route('admin.staff.index')->with('message', __('message.user.update'));
    }


    public function showPasswordForm(User $user)
    {
        return inertia('Admin/Staff/Password', [
            'user' => [
                'id' => $user->id,
            ],
        ]);
    }


    public function updatePassword(User $user)
    {
        $user->update(Request::validate(['password' => 'required|min:8|confirmed']));
        return redirect()->route('admin.staff.index')->with('message', __('passwords.reset'));
    }


    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('admin.staff.index')->with('message', __('message.user.delete'));
    }


    public function uploadStaff()
    {
        Request::validate(['file' => 'required|max:1024|mimes:xlsx,xls']);
        
        Excel::import(new UsersImport, Request::file('file'));
        return back()->with('message', __('message.file.upload'));
    }
    
}
