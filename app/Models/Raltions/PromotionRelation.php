<?php
namespace App\Models\Relations;
use App\Models\Cinema;

trait PromotionRelation
{
    public function cinema()
    {
        return $this->hasMany(Cinema::class);
    } 
}