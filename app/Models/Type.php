<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'name',
        'description',
        'type',
    ];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function movieType()
    {
        return $this->hasMany(MovieType::class);
    }
}
