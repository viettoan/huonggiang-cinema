<?php
namespace App\Models\Relations;
use App\Models\Post;
use App\Models\Movie;
use App\Models\Cinema;

trait TimeRelation
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
    public function cinemas()
    {
        return $this->hasMany(Cinema::class);
    }
}