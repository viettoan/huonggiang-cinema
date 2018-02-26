<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CinemaSchedule extends Model
{
    
    protected $fillable = [
        'cinema_id',
        'movie_id',
        'schedule_id',
    ];
    protected $table = 'cinema_schedule';
    
    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
