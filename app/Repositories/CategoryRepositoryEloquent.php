<?php
namespace App\Repositories;
use App\Contracts\CinemaRepository;
use App\Models\Cinema;
class CinemaRepositoryEloquent extends AbstractRepositoryEloquent implements CinemaRepository
{
    public function model()
    {
        return new Cinema;
    }
    
}