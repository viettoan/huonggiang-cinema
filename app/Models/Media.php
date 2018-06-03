<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
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
    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }
    public function getpathAttribute($value)
    {
        return asset(config('custom.defaultMedia') . $value);
    }
}
