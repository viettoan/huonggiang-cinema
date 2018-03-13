<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function movieTechnology()
    {
        return $this->hasMany(MovieTechnology::class);
    }
}
