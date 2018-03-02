<?php
namespace App\Contracts;
use App\Contracts\AbstractRepository;

interface TimeRepository extends AbstractRepository
{
    public function getTimeFree($timeActive = [], $with = [], $select = ['*']);
}
