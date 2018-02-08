<?php
namespace App\Contracts;
use App\Contracts\AbstractRepository;

interface MovieRepository extends AbstractRepository
{
    public function getMovieByStatus($status, $with = [], $select = ['*']);
}
