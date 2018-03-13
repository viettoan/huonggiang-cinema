<?php
namespace App\Contracts;
use App\Contracts\AbstractRepository;

interface MovieTechnologyRepository extends AbstractRepository
{
    public function getByMovieid ($movie_id, $with = [], $select = ['*']);    
}
