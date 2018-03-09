<?php
namespace App\Repositories;
use App\Contracts\CinemaSystemRepository;
use App\Models\CinemaSystem;

class CinemaSystemRepositoryEloquent extends AbstractRepositoryEloquent implements CinemaSystemRepository
{
    public function model()
    {
        return new CinemaSystem;
    }

    public function getCinemaSystemByStatus($status, $with = [], $select = ['*'])
    {
        return $this->model()->select($select)->with($with)->where('status', $status)->get();
    }
}