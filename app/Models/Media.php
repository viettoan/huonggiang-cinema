<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\Relations\MediaRelation;

class Media extends Model
{
    use MediaRelation;
    
    protected $fillable = [
        'path',
        'description',
        'status',
    ];

}
