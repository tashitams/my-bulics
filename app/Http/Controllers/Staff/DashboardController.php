<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;

class DashboardController extends Controller
{
    public function index()
    {
        return inertia('Staff/Dashboard', [
            'can' => [
                'edit_leave' => auth()->user()->can('edit_leave')
            ],
            'user' => auth()->user()->only('name', 'user_role', 'profile_pic'),
        ]);
    }


    public function showSchoolProfile()
    {
        return inertia('Staff/SchoolProfile', [
            'grades' => Grade::getClassTeacher()->get()
        ]);
    }
}
