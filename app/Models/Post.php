<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\Relations\PostRelation;

class Post extends Model
{
    use PostRelation;
    
    protected $fillable = [
        'title',
        'description',
        'content',
        'status',
        'media_id',
    ];

}
