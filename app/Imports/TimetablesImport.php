<?php

namespace App\Imports;

use App\Models\Timetable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TimetablesImport implements ToModel, WithHeadingRow
{
    
    public function model(array $row)
    {
        return new Timetable([
            'grade_id' => $row['grade_id'],
            'mon_1' => $row['mon_1'],
            'mon_2' => $row['mon_2'],
            'mon_3' => $row['mon_3'],
            'mon_4' => $row['mon_4'],
            'mon_5' => $row['mon_5'],
            'mon_6' => $row['mon_6'],
            'mon_7' => $row['mon_7'],
            'tue_1' => $row['tue_1'],
            'tue_2' => $row['tue_2'],
            'tue_3' => $row['tue_3'],
            'tue_4' => $row['tue_4'],
            'tue_5' => $row['tue_5'],
            'tue_6' => $row['tue_6'],
            'tue_7' => $row['tue_7'],
            'wed_1' => $row['wed_1'],
            'wed_2' => $row['wed_2'],
            'wed_3' => $row['wed_3'],
            'wed_4' => $row['wed_4'],
            'wed_5' => $row['wed_5'],
            'wed_6' => $row['wed_6'],
            'wed_7' => $row['wed_7'],
            'thu_1' => $row['thu_1'],
            'thu_2' => $row['thu_2'],
            'thu_3' => $row['thu_3'],
            'thu_4' => $row['thu_4'],
            'thu_5' => $row['thu_5'],
            'thu_6' => $row['thu_6'],
            'thu_7' => $row['thu_7'],
            'fri_1' => $row['fri_1'],
            'fri_2' => $row['fri_2'],
            'fri_3' => $row['fri_3'],
            'fri_4' => $row['fri_4'],
            'fri_5' => $row['fri_5'],
            'fri_6' => $row['mon_6'],
            'fri_7' => $row['fri_7'],
        ]);
    }
}
