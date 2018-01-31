<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CinemaSchedule extends Model
{
    
    protected $fillable = [
        'cinema_id',
        'movie_id',
        'day_id',
        'price',
    ];
    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }
    public function movie()
    {
        return $this->belongsTo(Media::class);
    }
}
