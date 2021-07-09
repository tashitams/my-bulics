<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    protected $dates = ['dob'];

    public function getDobAttribute() 
    {
        return date('Y-m-d', strtotime($this->attributes['dob']));
    }
    
    // Relationships
    
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function healths()
    {
        return $this->hasMany(StudentHealth::class);
    } 

    public function disciplines()
    {
        return $this->hasMany(StudentDiscipline::class);
    }

    
}
