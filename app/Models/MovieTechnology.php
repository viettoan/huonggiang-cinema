<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieTechnology extends Model
{
    protected $fillable = [
        'movie_id',
        'technology_id',
    ];

    protected $table = 'movie_technology';

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function technology()
    {
        return $this->belongsTo(Technology::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
