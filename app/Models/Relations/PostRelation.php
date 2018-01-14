<?php
namespace App\Models\Relations;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Media;

trait PostRelation
{
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