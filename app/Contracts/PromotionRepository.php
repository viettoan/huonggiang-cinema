<?php
namespace App\Contracts;
use App\Contracts\AbstractRepository;

interface PromotionRepository extends AbstractRepository
{
    public function getPromotionByStatus($status, $with = [], $select = ['*']); 
}
