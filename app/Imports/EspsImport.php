<?php

namespace App\Imports;

use App\Models\Esp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;


class EspsImport implements ToModel, WithHeadingRow
{
    
    public function model(array $row)
    {
        return new Esp([
            'name' => $row['name'],
            'designation' => $row['designation'],
            'phone_no' => $row['phone_no'],
            'cid_no' => $row['cid_no'],
            'address' => $row['address'],
            'joining_date' => Date::excelToDateTimeObject($row['joining_date']),
            'profile_pic' => $row['profile_pic'],
        ]);
    }
}
