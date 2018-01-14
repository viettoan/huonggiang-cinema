<?php
namespace App\Models\Relations;
use App\Models\Cinema;
use App\Models\Promotion;
use App\Models\CinemaSchedule;
use App\Models\Media;

trait CinemaRelation
{
    public function promtions()
    {
        return $this->hasMany(Promotion::class);
    }
    public function cinema_schedules()
    {
        return $this->hasMany(CinemaSchedule::class);
    }
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}