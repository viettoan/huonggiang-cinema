<?php
namespace App\Repositories;
use App\Contracts\CityRepository;
use App\Models\City;

class CityRepositoryEloquent extends AbstractRepositoryEloquent implements CityRepository
{
    public function model()
    {
        return new City;
    }
}