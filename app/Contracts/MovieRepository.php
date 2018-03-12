<?php
namespace App\Contracts;
use App\Contracts\AbstractRepository;

interface MovieRepository extends AbstractRepository
{
    public function getMovieByStatus($status, $with = [], $select = ['*']);
    public function getMovieByNotStatus($status, $with = [], $select = ['*']);
    public function getMovieHaveNotSchedule($movies = [], $with = [], $select = ['*']);
}
