<?php
namespace App\Repositories;
use App\Contracts\MovieRepository;
use App\Models\Movie;
class MovieRepositoryEloquent extends AbstractRepositoryEloquent implements MovieRepository
{
    public function model()
    {
        return new Movie;
    }
    
    public function getMovieByStatus($status, $with = [], $select = ['*'])
    {
        return $this->model()->select($select)->with($with)->where('status', $status)->get();
    }
}