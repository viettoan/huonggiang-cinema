<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cinema extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = [
        'cinema_system_id',
        'city_id',
        'name',
        'address',
        'description',
        'media',
        'status',
        'location',
    ];
    public function promtions()
    {
        return $this->hasMany(Promotion::class);
    }
    public function schedules()
    {
        return $this->hasMany(CinemaSchedule::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function cinemaSystem()
    {
        return $this->belongsTo(CinemaSystem::class);
    }
    public function bookingMovies()
    {
        return $this->hasMany(BookingMovie::class);
    }

    public function getMediaAttribute($value)
    {
        return asset(config('custom.defaultMedia') . $value);
    }
}
