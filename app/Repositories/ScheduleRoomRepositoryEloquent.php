<?php
namespace App\Repositories;
use App\Contracts\ScheduleRoomRepository;
use App\Models\ScheduleRoom;

class ScheduleRoomRepositoryEloquent extends AbstractRepositoryEloquent implements ScheduleRoomRepository
{
    public function model()
    {
        return new ScheduleRooms;
    }
}