<?php
namespace App\Repositories;
use App\Contracts\TimeRepository;
use App\Models\Time;

class TimeRepositoryEloquent extends AbstractRepositoryEloquent implements TimeRepository
{
    public function model()
    {
        return new Time;
    }
}