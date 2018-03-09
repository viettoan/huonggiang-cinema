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

    public function getSchedules($paginate, $with = [], $select = ['*'])
    {
        return $this->model()->with($with)->select($select)->distinct()->paginate($paginate);
    }
    
    public function getSchedulesByMovieAndCinema($movie_id, $cinema_id, $with = [], $select = ['*'])
    {
        return $this->model()->with($with)->select($select)->where('movie_id', $movie_id)->where('cinema_id', $cinema_id)->get();
    }  
}