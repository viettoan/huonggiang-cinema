<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    
    protected $fillable = [
        'movie_id',
        'cinema_schedule_id',
        'user_id',
        'date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
    public function cinemaSchedule()
    {
        return $this->hasMany(CinemaSchedule::class);
    }
}
