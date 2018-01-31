<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    
    protected $fillable = [
        'name',
        'time',
        'director',
        'description',
        'status',
        'media_id',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function comments()
    {
        return $this->morphMany(Booking::class, 'commentable');
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
    public function cinemaSchedules()
    {
        return $this->hasMany(CinemaSchedule::class);
    }
}
