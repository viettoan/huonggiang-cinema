<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    
    protected $fillable = [
        'path',
        'description',
        'status',
        'type',
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
    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }
    public function getpathAttribute($value)
    {
        return asset(config('custom.defaultMedia') . $value);
    }
}
