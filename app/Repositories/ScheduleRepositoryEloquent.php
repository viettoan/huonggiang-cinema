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

    public function getByCinema($cinema_id, $with = [], $select = ['*'])
    {
        return $this->model()->with($with)->select($select)->where('cinema_id', $cinema_id)->get();
    }
    public function getByCinemaAndMovie($cinema_id, $movie_id, $with = [], $select = ['*'])
    {
        return $this->model()->with($with)->select($select)->where('movie_id', $movie_id)->where('cinema_id', $cinema_id)->get();
    }

    public function getByMovie($movie_id, $with = [], $select = ['*'])
    {
        return $this->model()->with($with)->select($select)->where('movie_id', $movie_id)->get();
    }

    public function getScheduleByCinemaAndDate($cinema_id, $date, $with = [], $select = ['*'])
    {
        return $this->model()->with($with)->select($select)->where('date', $date)->where('cinema_id', $cinema_id)->get();
    }

    public function getSchedulesByMovieAndCinema($movie_id, $cinema_id, $with = [], $select = ['*'])
    {
        return $this->model()->with($with)->select($select)->where('movie_id', $movie_id)->where('cinema_id', $cinema_id)->get();
    }

     public function search($keyword, $select = '*')
    {
        return $this->model()
            ->with(['movie', 'cinema'])
            ->select($select)
            ->whereIn('cinema_id', function($query) use ($keyword){
                $query->table('cinema')->where('name', 'LIKE', '%' . $keyword . '%')->get();
            })->paginate(10);
    }
}