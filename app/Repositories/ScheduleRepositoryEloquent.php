<?php
namespace App\Repositories;
use App\Contracts\ScheduleRepository;
use App\Models\Schedule;

class ScheduleRepositoryEloquent extends AbstractRepositoryEloquent implements ScheduleRepository
{
    public function model()
    {
        return new Schedule;
    }

    public function getScheduleByDateAndRoom($date, $room_id, $with = [], $select = ['*'])
    {
        return $this->model()->with($with)->select($select)->where('date', $date)->where('room_id', $room_id)->get();
    }    
}