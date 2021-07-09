<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    protected $guarded = [];
    public $timestamps = false;


    // relationship

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
