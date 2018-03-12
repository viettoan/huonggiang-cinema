<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    
    protected $fillable = [
        'time',
    ];

    public function scheduleTime()
    {
        return $this->hasMany(ScheduleTime::class);
    }
}
