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

    public function getCinemaByStatus($status, $with = [], $select = ['*'])
    {
        return $this->model()->select($select)->with($with)->where('status', $status)->get();
    }

    public function getByCinemaSystemAndCity($cinemaSystem, $city, $with = [], $select = ['*'])
    {
        return $this->model()->select($select)->with($with)->where('cinema_system_id', $cinemaSystem)->where('city_id', $city)->get();
    }    
}