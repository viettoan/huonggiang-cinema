<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MovieTechnology extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
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
