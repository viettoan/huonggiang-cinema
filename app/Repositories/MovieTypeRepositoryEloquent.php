<?php
namespace App\Repositories;
use App\Contracts\MovieTypeRepository;
use App\Models\MovieType;
class MovieTypeRepositoryEloquent extends AbstractRepositoryEloquent implements MovieTypeRepository
{
    public function model()
    {
        return new MovieType;
    }
    public function getTypeByMovieId($id,$with = [], $select = ['*'])
    {
        return $this->model()->with($with)->select($select)->where('movie_id', $id)->get();
    }
    public function deleteByMovieId($id)
    {
        return $this->model()->where('movie_id', $id)->delete();
    }
}