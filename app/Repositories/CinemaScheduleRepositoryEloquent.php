<?php
namespace App\Repositories;
use App\Contracts\CinemaScheduleRepository;
use App\Models\CinemaSchedule;

class CinemaScheduleRepositoryEloquent extends AbstractRepositoryEloquent implements CinemaScheduleRepository
{
    public function model()
    {
        return new CinemaSchedule;
    }

}