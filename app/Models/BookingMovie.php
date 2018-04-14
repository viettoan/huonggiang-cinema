<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingMovie extends Model
{
    
    protected $fillable = [
        'cinema_id',
        'movie_id',
        'link',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }
}
