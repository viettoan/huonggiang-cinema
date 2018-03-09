<?php
namespace App\Contracts;
use App\Contracts\AbstractRepository;

interface CinemaSystemRepository extends AbstractRepository
{
    public function getCinemaSystemByStatus($status, $with = [], $select = ['*']);
}
