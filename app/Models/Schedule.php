<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'day',
    ];

    public function cinemaSchedules()
    {
        return $this->hasMany(CinemaSchedule::class);
    }

    public function scheduleTime()
    {
        return $this->hasMany(ScheduleTime::class);
    }
}
