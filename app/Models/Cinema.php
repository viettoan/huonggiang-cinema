<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    
    protected $fillable = [
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
    public function cinemaSchedules()
    {
        return $this->hasMany(CinemaSchedule::class);
    }
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
