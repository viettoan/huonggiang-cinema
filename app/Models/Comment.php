<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\CommentRelation;

class Comment extends Model
{
    use CommentRelation;
    
    protected $fillable = [
        'commentable_id',
        'commentable_type',
        'user_id',
        'content',
        'status',
    ];

}
