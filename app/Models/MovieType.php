<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MovieType extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
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
