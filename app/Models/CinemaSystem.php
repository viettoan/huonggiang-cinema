<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CinemaSystem extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    public function cinemas()
    {
        return $this->hasMany(Cinema::class);
    }
}
