<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    protected $dates = ['event_date'];

    public function getEventDateAttribute() 
    {
        return date('Y-m-d', strtotime($this->attributes['event_date']));
    }
}
