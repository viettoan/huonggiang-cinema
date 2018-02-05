<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieType extends Model
{
    protected $table = 'movie_type';
    
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
