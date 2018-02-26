<?php
namespace App\Contracts;
use App\Contracts\AbstractRepository;

interface CinemaRepository extends AbstractRepository
{
    public function getCinemaByStatus($status,$with = [], $select = ['*']);
}
