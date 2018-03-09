<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    
    protected $fillable = [
        'time',
    ];

    public function roomTime()
    {
        return $this->hasMany(RoomTime::class);
    } 
}
