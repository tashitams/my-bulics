<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $guarded = [];

    protected $dates = ['from_date', 'to_date'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFromDateAttribute() 
    {
        return date('d-M', strtotime($this->attributes['from_date']));
    }

    public function getToDateAttribute() 
    {
        return date('d-M', strtotime($this->attributes['to_date']));
    }

    public function scopeGetStaffName($query)
    {
        return $query->addSelect([
            'staff_name' => User::select('name')->whereColumn('user_id', 'users.id'),
        ]);
    }
}
