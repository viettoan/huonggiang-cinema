<?php
namespace App\Models\Relations;
use App\Models\Booking;
use App\Models\Post;
use App\Models\User;
use App\Models\Rating;
use App\Models\Comment;

trait UserRelation
{
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}