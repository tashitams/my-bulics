<?php

namespace App\Http\Controllers\Admin;
use App\Models\Grade;
use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class StudentController extends Controller
{
    public function index()
    {
        return inertia('Admin/Student/Index', [
            'grades' => Grade::select('id', 'name')
            ->getClassTeacher()
            ->paginate(10)
        ]);
    }


    public function create()
    {
        return inertia('Admin/Student/Create', [
            'grades' => DB::table('grades')->select('id', 'name')->get()
        ]);
    }

    public function store()
    {
        Student::create(
            Request::validate([
                'name' => 'required|max:20',
                'student_code' => 'required|unique:students,student_code',
                'gender' => 'required',
                'dob' => 'required|date',
                'cid_no' => 'nullable|digits:11|unique:students,cid_no',
                'is_boarder' => 'required',
                'village' => 'required|max:30',
                'gewog' => 'required|max:30',
                'dzongkhag' => 'required|max:30',
                'father_name' => 'nullable|max:30',
                'mother_name' => 'nullable|max:30',
                'phone_no' => 'nullable|digits:8',
                'grade_id' => 'required|exists:grades,id',
            ])
        );

        return redirect()->route('admin.students.index')->with('message', __('message.student.store'));
    }


    public function show(Grade $grade)
    {
        return inertia('Admin/Student/Show', [
            'grade' => ['name' => $grade->name],
            'students' => DB::table('students')
            ->select('id', 'name', 'profile_pic')
            ->where('grade_id', $grade->id)
            ->orderBy('name')
            ->get()
            ->transform(fn ($student) => [
                'id' => $student->id,
                'name' => $student->name,
                'profile_pic' => $student->profile_pic,
            ]),
        ]);
    }



    public function edit(Student $student)
    {
        return inertia('Admin/Student/Edit', [
            'grades' => DB::table('grades')->select('id', 'name')->get(),
            'student' => [
                'id' => $student->id,
                'name' => $student->name,
                'student_code' => $student->student_code,
                'gender' => $student->gender,
                'dob' => $student->dob,
                'cid_no' => $student->cid_no,
                'is_boarder' => $student->is_boarder,
                'village' => $student->village,
                'gewog' => $student->gewog,
                'dzongkhag' => $student->dzongkhag,
                'father_name' => $student->father_name,
                'mother_name' => $student->mother_name,
                'phone_no' => $student->phone_no,
                'grade_id' => $student->grade_id,
            ]
        ]);
    }


    public function update(Student $student)
    {
        $student->update(
            Request::validate([
                'name' => 'required|max:30',
                'student_code' => 'required|max:17|unique:students,student_code,' .$student->id,
                'gender' => 'required',
                'dob' => 'required|date',
                'cid_no' => 'nullable|digits:11|unique:students,cid_no,' .$student->id,
                'is_boarder' => 'required',
                'village' => 'required|max:30',
                'gewog' => 'required|max:30',
                'dzongkhag' => 'required|max:30',
                'father_name' => 'nullable|max:30',
                'mother_name' => 'nullable|max:30',
                'phone_no' => 'nullable|digits:8',
                'grade_id' => 'required|exists:grades,id',
            ])
        );

        return redirect()->route('admin.students.show', $student->grade_id)->with('message', __('message.student.update'));
    }


    public function delete(Student $student)
    {
        $student->delete();
        return redirect()->route('admin.students.index')->with('message', __('message.student.delete'));
    }


    public function uploadStudent()
    {
        Request::validate(['file' => 'required|max:1024|mimes:xlsx,xls']);
        
        Excel::import(new StudentsImport, Request::file('file'));
        return back()->with('message', __('message.file.upload'));
    }
}
