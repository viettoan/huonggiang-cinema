<?php
namespace App\Repositories;
use App\Contracts\TechnologyRepository;
use App\Models\Technology;
use App\Repositories\AbstractRepositoryEloquent;

class TechnologyRepositoryEloquent extends AbstractRepositoryEloquent implements TechnologyRepository
{
    public function model()
    {
        return new Technology;
    }
    
}