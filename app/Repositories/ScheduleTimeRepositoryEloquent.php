<?php
namespace App\Repositories;
use App\Contracts\ScheduleTimeRepository;
use App\Models\ScheduleTime;

class ScheduleTimeRepositoryEloquent extends AbstractRepositoryEloquent implements ScheduleTimeRepository
{
    public function model()
    {
        return new ScheduleTime;
    }

    public function getByDateAndScheduleId($date, $schedule_id, $with = [], $select = ['*'])
    {
        return $this->model()->with($with)->select($select)->where('date', $date)->where('schedule_id', $schedule_id)->get();
    }
    
    public function getByDateAndTimeIdAndScheduleId($date, $time_id, $schedule_id, $with = [], $select = ['*'])
    {
        return $this->model()->with($with)->select($select)->where('date', $date)->where('schedule_id', $schedule_id)->where('time_id', $time_id)->get();        
    }

    public function getByScheduleId($schedule_id, $with = [], $select = ['*'])
    {
        return $this->model()->with($with)->select($select)->where('schedule_id', $schedule_id)->get();                
    }
    
    public function getDateByScheduleId($schedule_id, $with = [], $select = ['*'])
    {
        return $this->model()->with($with)->select($select)->where('schedule_id', $schedule_id)->distinct('date')->pluck('date')->toArray();
    }
}