<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\Relations\BookingRelation;

class Booking extends Model
{
    use BookingRelation;
    
    protected $fillable = [
        'movie_id',
        'cinema_schedule_id',
        'user_id',
        'date',
        'status',
    ];

}
