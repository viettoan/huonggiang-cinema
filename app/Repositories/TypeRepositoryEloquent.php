<?php
namespace App\Repositories;
use App\Contracts\TypeRepository;
use App\Models\Type;

class TypeRepositoryEloquent extends AbstractRepositoryEloquent implements TypeRepository
{
    public function model()
    {
        return new Type;
    }

    public function getTypeByMovie($with = [], $select = ['*'])
    {
        return $this->model()
            ->select($select)
            ->with($with)
            ->get();
    }

    public function getTypeByPost($with = [], $select = ['*'])
    {
        return $this->model()
            ->select($select)
            ->with($with)
            ->get();
    }
}