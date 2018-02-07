<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    
    protected $fillable = [
        'cinema_id',
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
        return $this->belongsTo(Cinema::class);
    }
}
