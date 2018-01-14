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
    
}