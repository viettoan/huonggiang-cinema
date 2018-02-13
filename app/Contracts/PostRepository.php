<?php
namespace App\Contracts;
use App\Contracts\AbstractRepository;

interface PostRepository extends AbstractRepository
{
    public function getPostByType($type, $with = [], $select = ['*']);
}
