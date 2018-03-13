<?php
namespace App\Repositories;
use App\Contracts\MovieTechnologyRepository;
use App\Models\MovieTechnology;
use App\Repositories\AbstractRepositoryEloquent;

class MovieTechnologyRepositoryEloquent extends AbstractRepositoryEloquent implements MovieTechnologyRepository
{
    public function model()
    {
        return new MovieTechnology;
    }
    
    public function getByMovieid ($movie_id, $with = [], $select = ['*'])
    {
        return $this->model()->with($with)->select($select)->where('movie_id', $movie_id)->get();
    }
}