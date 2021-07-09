<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Timetable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Imports\TimetablesImport;
use Maatwebsite\Excel\Facades\Excel;

class TimetableController extends Controller
{
    public function index()
    {
        return inertia('Admin/Timetable/Index', [
            'grades' => Grade::select('id', 'name')
            ->getClassTeacher()
            ->paginate(10)
        ]);
    }


    public function create()
    {
        return inertia('Admin/Timetable/Create', [
            'grades' => DB::table('grades')->select('id', 'name')->get()
        ]);
    }


    public function store()
    {
        Timetable::create(
            Request::validate([
                'grade_id' => 'required|exists:grades,id|unique:timetables,grade_id',
                'mon_1' => 'required|max:10',
                'mon_2' => 'required|max:10',
                'mon_3' => 'required|max:10',
                'mon_4' => 'required|max:10',
                'mon_5' => 'nullable|max:10',
                'mon_6' => 'nullable|max:10',
                'mon_7' => 'nullable|max:10',
                'tue_1' => 'required|max:10',
                'tue_2' => 'required|max:10',
                'tue_3' => 'required|max:10',
                'tue_4' => 'required|max:10',
                'tue_5' => 'nullable|max:10',
                'tue_6' => 'nullable|max:10',
                'tue_7' => 'nullable|max:10',
                'wed_1' => 'required|max:10',
                'wed_2' => 'required|max:10',
                'wed_3' => 'required|max:10',
                'wed_4' => 'required|max:10',
                'wed_5' => 'nullable|max:10',
                'wed_6' => 'nullable|max:10',
                'wed_7' => 'nullable|max:10',
                'thu_1' => 'required|max:10',
                'thu_2' => 'required|max:10',
                'thu_3' => 'required|max:10',
                'thu_4' => 'required|max:10',
                'thu_5' => 'nullable|max:10',
                'thu_6' => 'nullable|max:10',
                'thu_7' => 'nullable|max:10',
                'fri_1' => 'required|max:10',
                'fri_2' => 'required|max:10',
                'fri_3' => 'required|max:10',
                'fri_4' => 'required|max:10',
                'fri_5' => 'nullable|max:10',
                'fri_6' => 'nullable|max:10',
                'fri_7' => 'nullable|max:10',
            ])
        );

        return redirect()->route('admin.timetables.index')->with('message', __('message.timetable.store'));
    }


    public function edit(Timetable $timetable)
    {
        return inertia('Admin/Timetable/Edit', [
            'timetable' => [
                'id' => $timetable->id,
                'mon_1' => $timetable->mon_1,
                'mon_2' => $timetable->mon_2,
                'mon_3' => $timetable->mon_3,
                'mon_4' => $timetable->mon_4,
                'mon_5' => $timetable->mon_5,
                'mon_6' => $timetable->mon_6,
                'mon_7' => $timetable->mon_7,
                'tue_1' => $timetable->tue_1,
                'tue_2' => $timetable->tue_2,
                'tue_3' => $timetable->tue_3,
                'tue_4' => $timetable->tue_4,
                'tue_5' => $timetable->tue_5,
                'tue_6' => $timetable->tue_6,
                'tue_7' => $timetable->tue_7,
                'wed_1' => $timetable->wed_1,
                'wed_2' => $timetable->wed_2,
                'wed_3' => $timetable->wed_3,
                'wed_4' => $timetable->wed_4,
                'wed_5' => $timetable->wed_5,
                'wed_6' => $timetable->wed_6,
                'wed_7' => $timetable->wed_7,
                'thu_1' => $timetable->thu_1,
                'thu_2' => $timetable->thu_2,
                'thu_3' => $timetable->thu_3,
                'thu_4' => $timetable->thu_4,
                'thu_5' => $timetable->thu_5,
                'thu_6' => $timetable->thu_6,
                'thu_7' => $timetable->thu_7,
                'fri_1' => $timetable->fri_1,
                'fri_2' => $timetable->fri_2,
                'fri_3' => $timetable->fri_3,
                'fri_4' => $timetable->fri_4,
                'fri_5' => $timetable->fri_5,
                'fri_6' => $timetable->fri_6,
                'fri_7' => $timetable->fri_7,
            ]
        ]);
    }


    public function update(Timetable $timetable)
    {
        $timetable->update(
            Request::validate([
                'mon_1' => 'required|max:10',
                'mon_2' => 'required|max:10',
                'mon_3' => 'required|max:10',
                'mon_4' => 'required|max:10',
                'mon_5' => 'nullable|max:10',
                'mon_6' => 'nullable|max:10',
                'mon_7' => 'nullable|max:10',
                'tue_1' => 'required|max:10',
                'tue_2' => 'required|max:10',
                'tue_3' => 'required|max:10',
                'tue_4' => 'required|max:10',
                'tue_5' => 'nullable|max:10',
                'tue_6' => 'nullable|max:10',
                'tue_7' => 'nullable|max:10',
                'wed_1' => 'required|max:10',
                'wed_2' => 'required|max:10',
                'wed_3' => 'required|max:10',
                'wed_4' => 'required|max:10',
                'wed_5' => 'nullable|max:10',
                'wed_6' => 'nullable|max:10',
                'wed_7' => 'nullable|max:10',
                'thu_1' => 'required|max:10',
                'thu_2' => 'required|max:10',
                'thu_3' => 'required|max:10',
                'thu_4' => 'required|max:10',
                'thu_5' => 'nullable|max:10',
                'thu_6' => 'nullable|max:10',
                'thu_7' => 'nullable|max:10',
                'fri_1' => 'required|max:10',
                'fri_2' => 'required|max:10',
                'fri_3' => 'required|max:10',
                'fri_4' => 'required|max:10',
                'fri_5' => 'nullable|max:10',
                'fri_6' => 'nullable|max:10',
                'fri_7' => 'nullable|max:10',
            ])
        );

        return redirect()->route('admin.timetables.index')->with('message', __('message.timetable.update'));
    }

    public function uploadTimetable()
    {
        Request::validate(['file' => 'required|max:1024|mimes:xlsx,xls']);

        Excel::import(new TimetablesImport, Request::file('file'));
        return back()->with('message', __('message.file.upload'));
    }
}
