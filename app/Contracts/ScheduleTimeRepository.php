<?php
namespace App\Contracts;
use App\Contracts\AbstractRepository;

interface ScheduleTimeRepository extends AbstractRepository
{
    public function getMovieByScheduleId($id, $with = [], $select = ['*']);
}
