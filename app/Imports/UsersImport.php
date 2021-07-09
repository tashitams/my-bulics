<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class UsersImport implements ToModel, WithHeadingRow
{
   
    public function model(array $row)
    {
        return new User([
            'name' => $row['name'],
            'designation' => $row['designation'],
            'email' => $row['email'],
            'employee_id' => $row['employee_id'],
            'cid_no' => $row['cid_no'],
            'phone_no' => $row['phone_no'],
            'qualification' => $row['qualification'],
            'address' => $row['address'],
            'joining_date' => Date::excelToDateTimeObject($row['joining_date']),
            'password' => $row['password'],
            'school_role' => $row['school_role'],
            'user_role' => $row['user_role'],
            'profile_pic' => $row['profile_pic'],
        ]);
    }
}
