<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleRoom extends Model
{
    protected $fillable = [
        'room_id',
        'schedule_id',
        'date',
    ];

    protected $table = 'schedule_room';

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
