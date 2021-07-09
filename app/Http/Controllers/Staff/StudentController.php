<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Student;
use App\Models\StudentDiscipline;
use App\Models\StudentHealth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        return inertia('Staff/Student/Index', [
            'grades' => Grade::select('id', 'name')
            ->getClassTeacher()
            ->get()
        ]);
    }


    public function show(Grade $grade)
    {
        return inertia('Staff/Student/Show', [
            'can' => [
                'edit_student' => auth()->user()->can('edit_student', $grade)
            ],
            'class_name' => $grade->name,
            'students' => DB::table('students')
            ->select('id', 'name', 'student_code', 'profile_pic')
            ->where('grade_id', $grade->id)
            ->get()
            ->transform(fn ($student) => [
                'id' => $student->id,
                'name' => $student->name,
                'student_code' => $student->student_code,
                'profile_pic' => $student->profile_pic,
            ]),
        ]);
    }


    public function profile(Student $student)
    {
        return inertia('Staff/Student/Profile', [
            'student' => [
                'id' => $student->id,
                'name' => $student->name,
                'student_code' => $student->student_code,
                'cid_no' => $student->cid_no,
                'gender' => $student->gender,
                'dob' => $student->dob,
                'is_boarder' => $student->is_boarder,
                'village' => $student->village,
                'gewog' => $student->gewog,
                'dzongkhag' => $student->dzongkhag,
                'father_name' => $student->father_name,
                'mother_name' => $student->mother_name,
                'phone_no' => $student->phone_no,
                'grade_id' => $student->grade_id,
                'profile_pic' => $student->profile_pic,
                'healths' => $student->healths()->get()->map->only('id', 'title', 'description', 'staff_name', 'created_at'),
                'disciplines' => $student->disciplines()->get()->map->only('id', 'title', 'description', 'staff_name', 'created_at'),
            ],
        ]);
    }


    public function edit(Student $student)
    {
        return inertia('Staff/Student/Edit', [
            'student' => [
                'id' => $student->id,
                'name' => $student->name,
                'student_code' => $student->student_code,
                'cid_no' => $student->cid_no,
                'gender' => $student->gender,
                'dob' => $student->dob,
                'is_boarder' => $student->is_boarder,
                'village' => $student->village,
                'gewog' => $student->gewog,
                'dzongkhag' => $student->dzongkhag,
                'father_name' => $student->father_name,
                'mother_name' => $student->mother_name,
                'phone_no' => $student->phone_no,
                'grade_id' => $student->grade_id,
                'profile_pic' => $student->profile_pic,
            ],
        ]);
    }


    public function update(Student $student, Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
            'student_code' => 'required|max:17|unique:students,student_code,'.$student->id,
            'cid_no' => 'nullable|digits:11|unique:students,cid_no,'.$student->id,
            'gender' => 'required|max:50',
            'dob' => 'required|date',
            'is_boarder' => 'required|max:10',
            'gewog' => 'required|max:30',
            'dzongkhag' => 'required|max:30',
            'father_name' => 'nullable|max:30',
            'mother_name' => 'nullable|max:30',
            'phone_no' => 'nullable|digits:8',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        if ($request->hasFile('profile_pic')) {
            $extension = $request->profile_pic->getClientOriginalExtension();
            $fileName = $student->student_code.'.'.$extension;

            if ($student->profile_pic != 'default.png') {
                Storage::delete('/public/img/' . $student->profile_pic);
            }

            $request->profile_pic->storeAs('img', $fileName, 'public');
            $student->update(['profile_pic' => $fileName]);
        }

        $student->update($request->except('profile_pic'));
        return redirect()->route('staff.students.show', $student->grade_id)
        ->with('message', __('message.student.update'));
    }


    public function showHealthForm(Student $student)
    {
        return inertia('Staff/Student/Health', [
            'student' => [
                'id' => $student->id,
                'name' => $student->name,
            ],
        ]);
    }

    public function storeHealthRecord(Student $student, Request $request)
    {
        $request->validate([
            'title' => 'required|max:30',
            'description' => 'required|max:200'
        ]);

        StudentHealth::create([
            'title' => $request->title,
            'description' => $request->description,
            'student_id' => $student->id,
            'staff_name' => auth()->user()->name,
        ]);

        return redirect()->route('staff.students.profile', $student->id)
        ->with('message', __('message.student.health'));
    }


    public function showDisciplineForm(Student $student)
    {
        return inertia('Staff/Student/Discipline', [
            'student' => [
                'id' => $student->id,
                'name' => $student->name,
            ],
        ]);
    }

    public function storeDisciplineRecord(Student $student, Request $request)
    {
        $request->validate([
            'title' => 'required|max:30',
            'description' => 'required|max:200'
        ]);

        StudentDiscipline::create([
            'title' => $request->title,
            'description' => $request->description,
            'student_id' => $student->id,
            'staff_name' => auth()->user()->name,
        ]);

        return redirect()->route('staff.students.profile', $student->id)
        ->with('message', __('message.student.discipline'));
    }
}
