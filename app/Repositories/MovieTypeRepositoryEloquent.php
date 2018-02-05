<?php
namespace App\Repositories;
use App\Contracts\MovieTypeRepository;
use App\Models\MovieType;
class MovieTypeRepositoryEloquent extends AbstractRepositoryEloquent implements MovieTypeRepository
{
    public function model()
    {
        return new MovieType;
    }
    
}