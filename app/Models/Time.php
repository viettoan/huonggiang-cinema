<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Time extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = [
        'time',
    ];

    public function scheduleTime()
    {
        return $this->hasMany(ScheduleTime::class);
    }
}
