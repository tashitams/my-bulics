<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    public $timestamps = false;

    protected $hidden = ['password'];

    protected $dates = ['joining_date'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getJoiningDateAttribute() 
    {
        return date('Y-m-d', strtotime($this->attributes['joining_date']));
    }


    // Relationships

    public function grade()
    {
        return $this->hasOne(Grade::class);
    }

    public function timetable()
    {
        return $this->hasOne(Timetable::class);
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }    
}
