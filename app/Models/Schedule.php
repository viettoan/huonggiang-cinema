<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'cinema_id',
        'movie_id'
    ];

    public function scheduleRoom()
    {
        return $this->hasMany(ScheduleRoom::class);
    }

    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
