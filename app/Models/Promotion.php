<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = [
        'cinema_id',
        'media',
        'title',
        'description',
        'content',
        'start',
        'end',
        'sale',
        'status',
    ];
    public function getMediaAttribute($value)
    {
        return asset(config('custom.defaultMedia') . $value);
    }
    public function cinema()
    {
        return $this->belongsTo(CinemaSystem::class);
    }
}
