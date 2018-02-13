<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'content',
        'status',
        'media_id',
        'type',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function comments()
    {
        return $this->morphMany(Booking::class, 'commentable');
    }
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
