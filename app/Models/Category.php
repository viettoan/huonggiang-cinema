<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'parent_id',
    ];
    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
    public function parentCategories()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
