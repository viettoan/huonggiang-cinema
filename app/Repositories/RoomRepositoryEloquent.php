<?php
namespace App\Repositories;
use App\Contracts\RoomRepository;
use App\Models\Room;

class RoomRepositoryEloquent extends AbstractRepositoryEloquent implements RoomRepository
{
    public function model()
    {
        return new Room;
    }

    public function getRoomFree($roomActive = [], $with = [], $select = ['*'])
    {
        return $this->model()->with($with)->select($select)->whereNotIn('id', $roomActive)->get(); 
    }    
}