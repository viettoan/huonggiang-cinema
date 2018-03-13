<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    
    protected $fillable = [
        'name',
        'time',
        'release_date',
        'directors',
        'actors',
        'description',
        'status',
        'media_id',
    ];

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
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
    public function trailers()
    {
        return $this->hasMany(Trailer::class);
    }
    public function movieTypes()
    {
        return $this->hasMany(MovieType::class);
    }

    public function movieTechnology()
    {
        return $this->hasMany(MovieTechnology::class);
    }
}
