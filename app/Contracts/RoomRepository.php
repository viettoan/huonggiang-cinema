<?php
namespace App\Contracts;
use App\Contracts\AbstractRepository;

interface RoomRepository extends AbstractRepository
{
    public function getRoomFree($roomActive = [], $with = [], $select = ['*']);
}
