<?php
namespace App\Repositories;
use App\Contracts\ScheduleRepository;
use App\Models\Schedule;

class ScheduleRepositoryEloquent extends AbstractRepositoryEloquent implements ScheduleRepository
{
    public function model()
    {
        return new Schedule;
    }
}