<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    
    protected $fillable = [
        'movie_id',
        'cinema_id',
        'link',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function cinemaSystem()
    {
        return $this->belongsTo(Cinema::class);
    }
}
