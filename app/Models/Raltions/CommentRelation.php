<?php
namespace App\Models\Relations;
use App\Models\User;

trait CinemaScheduleRelation
{
    public function commentable()
    {
        return $this->morphTo();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}