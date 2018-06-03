<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScheduleTime extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = [
        'time_id',
        'schedule_id',
        'date',
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
