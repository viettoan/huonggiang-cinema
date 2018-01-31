<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    
    protected $fillable = [
        'title',
        'description',
        'content',
        'start',
        'end',
        'sale',
        'status',
    ];
    public function cinema()
    {
        return $this->hasMany(Cinema::class);
    }
}
