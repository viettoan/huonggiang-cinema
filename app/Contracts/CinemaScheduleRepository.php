<?php
namespace App\Contracts;
use App\Contracts\AbstractRepository;

interface CinemaScheduleRepository extends AbstractRepository
{
    public function getSchedules($paginate, $with = [], $select = ['*']);

    public function getSchedulesByMovieAndCinema($movie_id, $cinema_id, $with = [], $select = ['*']);
}
