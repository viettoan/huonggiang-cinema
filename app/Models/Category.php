<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\Relations\CategoryRelation;

class Category extends Model
{
    use CategoryRelation;
    
    protected $fillable = [
        'name',
        'description',
        'parent_id',
    ];

}
