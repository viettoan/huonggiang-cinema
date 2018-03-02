<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'date',
        'room_id'
    ];

    public function cinemaSchedules()
    {
        return $this->hasMany(CinemaSchedule::class);
    }

    public function scheduleTime()
    {
        return $this->hasMany(ScheduleTime::class);
    }

    public function room()
    {
        return $this->belongsTo(Schedule::class);
    }
}
