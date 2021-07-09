<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Timetable;
use Illuminate\Support\Facades\DB;

class TimetableController extends Controller
{
    public function index()
    {
        return inertia('Staff/Timetable/Index', [
            'grades' => Grade::select('id', 'name')
            ->getClassTeacher()
            ->get()
        ]);
    }

    public function show(Timetable $timetable)
    {
        return inertia('Staff/Timetable/Show', [
            'class_name' => DB::table('grades')->where('id', $timetable->grade_id)->value('name'),
            'period' => [
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
            ],
        ]);
    }
}
