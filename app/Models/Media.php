<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    
    protected $fillable = [
        'path',
        'description',
        'status',
    ];

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
