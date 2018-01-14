<?php
namespace App\Models\Relations;
use App\Models\Post;
use App\Models\Movie;
use App\Models\Category;

trait CategoryRelation
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}