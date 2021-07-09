<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Esp extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    protected $dates = ['joining_date'];

    public function getJoiningDateAttribute() 
    {
        return date('Y-m-d', strtotime($this->attributes['joining_date']));
    }
}
