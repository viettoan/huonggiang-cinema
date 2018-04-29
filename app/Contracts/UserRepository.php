<?php
namespace App\Contracts;
use App\Contracts\AbstractRepository;

interface UserRepository extends AbstractRepository
{
   public function search($keyword, $with = [], $select = '*');
}
