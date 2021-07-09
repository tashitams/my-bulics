<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ClassesImport;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Facades\Excel;

class ClassesController extends Controller
{
    public function index()
    {
        

        return inertia('Admin/Class/Index', [
            'grades' => Grade::select('id', 'name')
                ->getClassTeacher()
                ->paginate(10)
        ]);
    }


    public function create()
    {
        return inertia('Admin/Class/Create', [
            'users' => DB::table('users')->select('id', 'name')->where('user_role', '=', 'Teacher')->get()
        ]);
    }


    public function store()
    {
        Grade::create(
            Request::validate([
                'name' => 'required|max:20',
                'user_id' => 'required|exists:users,id|unique:users,id',
                'boarder_boys' => 'required|numeric|min:0|max:30',
                'boarder_girls' => 'required|numeric|min:0|max:30',
                'dayscholar_boys' => 'required|numeric|min:0|max:30',
                'dayscholar_girls' => 'required|numeric|min:0|max:30',
            ])
        );

        return redirect()->route('admin.classes.index')->with('message', __('message.class.store'));
    }


    public function edit(Grade $grade)
    {
        return inertia('Admin/Class/Edit', [
            'grade' => [
                'id' => $grade->id,
                'user_id' => $grade->user_id,
                'name' => $grade->name,
                'boarder_boys' => $grade->boarder_boys,
                'boarder_girls' => $grade->boarder_girls,
                'dayscholar_boys' => $grade->dayscholar_boys,
                'dayscholar_girls' => $grade->dayscholar_girls,
            ],
            'users' => DB::table('users')->select('id', 'name')->where('user_role', '=', 'Teacher')->get()
        ]);
    }


    public function update(Grade $grade)
    {
        $grade->update(
            Request::validate([
                'name' => 'required|max:20',
                'user_id' => 'required|exists:users,id|unique:grades,user_id,'.$grade->id,
                'boarder_boys' => 'required|numeric|min:0|max:30',
                'boarder_girls' => 'required|numeric|min:0|max:30',
                'dayscholar_boys' => 'required|numeric|min:0|max:30',
                'dayscholar_girls' => 'required|numeric|min:0|max:30',
            ])
        );

        return redirect()->route('admin.classes.index')->with('message', __('message.class.update'));
    }


    public function delete(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('admin.classes.index')->with('message', __('message.class.delete'));
    }


    public function uploadClass()
    {
        Request::validate(['file' => 'required|max:1024|mimes:xlsx,xls']);
        
        Excel::import(new ClassesImport, Request::file('file'));
        return back()->with('message', __('message.file.upload'));
    }
}
