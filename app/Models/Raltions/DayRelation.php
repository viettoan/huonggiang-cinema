<?php
namespace App\Models\Relations;
use App\Models\Schedule;

trait DayRelation
{
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    } 
}