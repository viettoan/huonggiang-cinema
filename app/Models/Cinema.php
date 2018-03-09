<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    
    protected $fillable = [
        'cinema_system_id',
        'city_id',
        'name',
        'address',
        'description',
        'media_id',
        'status',
    ];
    public function promtions()
    {
        return $this->hasMany(Promotion::class);
    }
    public function schedules()
    {
        return $this->hasMany(CinemaSchedule::class);
    }
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function cinemaSystem()
    {
        return $this->belongsTo(CinemaSystem::class);
    }
}
