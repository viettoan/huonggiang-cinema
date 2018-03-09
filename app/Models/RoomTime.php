<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomTime extends Model
{
    protected $fillable = [
        'time_id',
        'room_id'
    ];

    protected $table = 'room_time';

    public function time()
    {
        return $this->belongsTo(Time::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
