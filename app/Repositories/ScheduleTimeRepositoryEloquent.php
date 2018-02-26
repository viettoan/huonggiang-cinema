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
    public function getMovieByScheduleId($id, $with = [], $select = ['*'])
    {
        return $this->model()->with($with)->select($select)->where('schedule_id', $id)->get();
    }
}