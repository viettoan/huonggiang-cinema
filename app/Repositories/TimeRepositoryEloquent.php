<?php
namespace App\Repositories;
use App\Contracts\TimeRepository;
use App\Models\Time;

class TimeRepositoryEloquent extends AbstractRepositoryEloquent implements TimeRepository
{
    public function model()
    {
        return new Time;
    }

    public function getTimeFree($timeActive = [], $with = [], $select = ['*'])
    {
        return $this->model()->with($with)->select($select)->orderBy('time', 'ASC')->whereNotIn('id', $timeActive)->get(); 
    }   
}