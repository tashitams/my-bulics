<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentHealth extends Model
{
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function getCreatedAtAttribute() 
    {
        return date('d-M-Y', strtotime($this->attributes['created_at']));
    }
}
