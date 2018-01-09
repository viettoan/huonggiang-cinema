<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\Relations\CinemaRelation;

class Cinema extends Model
{
    use CinemaRelation;
    
    protected $fillable = [
        'name',
        'address',
        'description',
        'media_id',
    ];

}
