<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\Relations\TimeRelation;

class Time extends Model
{
    use TimeRelation;
    
    protected $fillable = [
        'time',
    ];

}
