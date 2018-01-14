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
    
}