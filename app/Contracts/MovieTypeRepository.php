<?php
namespace App\Contracts;
use App\Contracts\AbstractRepository;

interface MovieTypeRepository extends AbstractRepository
{
    public function getTypeByMovieId($id,$with = [], $select = ['*']);
    public function deleteByMovieId($id);
}
