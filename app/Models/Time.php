<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    
    protected $fillable = [
        'time',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    } 
}
