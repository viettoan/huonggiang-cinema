<?php
namespace App\Contracts;
use App\Contracts\AbstractRepository;

interface ScheduleRepository extends AbstractRepository
{
    public function getScheduleByDateAndRoom($date, $room_id, $with = [], $select = ['*']);
}
