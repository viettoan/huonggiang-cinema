<?php
namespace App\Contracts;
use App\Contracts\AbstractRepository;

interface TypeRepository extends AbstractRepository
{
    public function getTypeByMovie($with = [], $select = ['*']);
}
