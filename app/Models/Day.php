<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\DayRelation;

class Day extends Model
{
    use DayRelation;
    
    protected $fillable = [
        'date',
    ];

}
