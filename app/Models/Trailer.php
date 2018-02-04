<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trailer extends Model
{
    protected $fillable = [
        'movie_id',
        'embedded_code',
    ];
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
