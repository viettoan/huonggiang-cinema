<?php
namespace App\Contracts;
use App\Contracts\AbstractRepository;

interface ScheduleRepository extends AbstractRepository
{
    public function getSchedules($paginate, $with = [], $select = ['*']);

    public function getMovieByCinema($cinema_id, $with = [], $select = ['*']);

    public function getScheduleByCinemaAndDate($cinema_id, $date, $with = [], $select = ['*']);
    
    public function getSchedulesByMovieAndCinema($movie_id, $cinema_id, $with = [], $select = ['*']);
}
