<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingMovie extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
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
