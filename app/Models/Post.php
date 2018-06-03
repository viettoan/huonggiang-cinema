<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'content',
        'status',
        'media',
    ];
    public function getMediaAttribute($value)
    {
        return asset(config('custom.defaultMedia') . $value);
    }
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
