<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Query Scope
    public function scopeGetClassTeacher($query)
    {
        return $query->addSelect([
            'class_teacher' => User::select('name')->whereColumn('user_id', 'users.id'),
            'profile_pic' => User::select('profile_pic')->whereColumn('user_id', 'users.id'),
        ]);
    }
}