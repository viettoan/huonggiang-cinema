<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = [
        'cinema_id',
        'movie_id',
        'movie_technology_id',
    ];

    public function scheduleTime()
    {
        return $this->hasMany(ScheduleTime::class);
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
