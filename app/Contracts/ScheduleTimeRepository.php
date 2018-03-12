<?php
namespace App\Contracts;
use App\Contracts\AbstractRepository;

interface ScheduleTimeRepository extends AbstractRepository
{
    public function getByDateAndScheduleId($date, $schedule_id, $with = [], $select = ['*']);

    public function getByDateAndTimeIdAndScheduleId($date, $time_id, $schedule_id, $with = [], $select = ['*']);

    public function getByScheduleId($schedule_id, $with = [], $select = ['*']);
}
