<?php

namespace App\Imports;

use App\Models\Event;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;


class EventsImport implements ToModel, WithHeadingRow
{
    
    public function model(array $row)
    {
        return new Event([
            'title'  => $row['title'],
            'event_date' => Date::excelToDateTimeObject($row['event_date']),
        ]);
    }
}
