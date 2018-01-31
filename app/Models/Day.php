<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    
    protected $fillable = [
        'date',
    ];
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
