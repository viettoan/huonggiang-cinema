<?php
namespace App\Models\Relations;
use App\Models\Booking;
use App\Models\Rating;
use App\Models\Comment;
use App\Models\CinemaSchedule;
use App\Models\Media;

trait MovieRelation
{
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