<?php
namespace App\Models\Relations;
use App\Models\Booking;
use App\Models\Movie;
use App\Models\User;
use App\Models\CinemaSchedule;

trait BookingRelation
{
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