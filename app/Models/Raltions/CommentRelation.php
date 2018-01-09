<?php
namespace App\Models\Relations;
use App\Models\Cinema;
use App\Models\Movie;

trait CinemaScheduleRelation
{
    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }
    public function movie()
    {
        return $this->belongsTo(Media::class);
    }
}