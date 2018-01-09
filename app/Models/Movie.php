<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\Relations\MovieRelation;

class Movie extends Model
{
    use MovieRelation;
    
    protected $fillable = [
        'name',
        'time',
        'director',
        'description',
        'status',
        'media_id',
    ];

}
