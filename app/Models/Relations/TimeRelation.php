<?php
namespace App\Models\Relations;
use App\Models\Schedule;

trait TimeRelation
{
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    } 
}