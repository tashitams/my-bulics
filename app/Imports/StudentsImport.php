<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class StudentsImport implements ToModel, WithHeadingRow
{
   
    public function model(array $row)
    {
        return new Student([
            'name' => $row['name'],
            'student_code' => $row['student_code'],
            'gender' => $row['gender'],
            'dob' => Date::excelToDateTimeObject($row['dob']),
            'is_boarder' => $row['is_boarder'],
            'village' => $row['village'],
            'gewog' => $row['gewog'],
            'dzongkhag' => $row['dzongkhag'],
            'father_name' => $row['father_name'],
            'mother_name' => $row['mother_name'],
            'phone_no' => $row['phone_no'],
            'grade_id' => $row['grade_id'],
            'profile_pic' => $row['profile_pic'],
        ]);
    }
}
