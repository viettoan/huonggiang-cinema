<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = [
        'name',
        'time',
        'release_date',
        'directors',
        'actors',
        'description',
        'status',
        'media',
    ];
    public function getMediaAttribute($value) //GET - XUẤT CSDL
    {
        return asset(config('custom.defaultMedia') . $value);
    }
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
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

    public function bookingMovies()
    {
        return $this->hasMany(BookingMovie::class);
    }
}
