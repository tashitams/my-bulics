<?php

namespace App\Imports;

use App\Models\Grade;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class ClassesImport implements ToModel, WithHeadingRow
{
    
    public function model(array $row)
    {
        return new Grade([
            'user_id' => $row['user_id'],
            'name' => $row['name'],
            'boarder_boys' => $row['boarder_boys'],
            'boarder_girls' => $row['boarder_girls'],
            'dayscholar_boys' => $row['dayscholar_boys'],
            'dayscholar_girls' => $row['dayscholar_girls'],
        ]);
    }
}
