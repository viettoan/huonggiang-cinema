<?php
namespace App\Repositories;
use App\Contracts\CinemaScheduleRepository;
use App\Models\CinemaSchedule;

class CinemaScheduleRepositoryEloquent extends AbstractRepositoryEloquent implements CinemaScheduleRepository
{
    public function model()
    {
        return new CinemaSchedule;
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