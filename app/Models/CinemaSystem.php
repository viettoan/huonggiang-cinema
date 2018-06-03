<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CinemaSystem extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    public function cinemas()
    {
        return $this->hasMany(Cinema::class);
    }
    public function bookingMovies()
    {
        return $this->hasMany(BookingMovie::class);
    }
}
