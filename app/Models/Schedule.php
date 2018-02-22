<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'day',
        'time_id',
    ];

    public function cinemaSchedules()
    {
        return $this->hasMany(CinemaSchedule::class);
    }

    public function time()
    {
        return $this->belongsTo(Time::class);
    }
}
