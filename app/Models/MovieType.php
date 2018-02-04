<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieType extends Model
{
    protected $fillable = [
        'movie_id',
        'type_id',
    ];
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
