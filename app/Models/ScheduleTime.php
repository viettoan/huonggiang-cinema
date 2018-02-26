<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleTime extends Model
{
    protected $fillable = [
        'time_id',
        'schedule_id'
    ];

    protected $table = 'schedule_time';

    public function time()
    {
        return $this->belongsTo(Time::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
