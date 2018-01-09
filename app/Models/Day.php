<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\Relations\DayRelation;

class Day extends Model
{
    use DayRelation;
    
    protected $fillable = [
        'date',
    ];

}
