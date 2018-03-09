<?php
namespace App\Repositories;
use App\Contracts\RoomTimeRepository;
use App\Models\RoomTime;

class RoomTimeRepositoryEloquent extends AbstractRepositoryEloquent implements RoomTimeRepository
{
    public function model()
    {
        return new RoomTime;
    }
}