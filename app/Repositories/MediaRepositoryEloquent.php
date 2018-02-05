<?php
namespace App\Repositories;
use App\Contracts\MediaRepository;
use App\Models\Media;

class MediaRepositoryEloquent extends AbstractRepositoryEloquent implements MediaRepository
{
    public function model()
    {
        return new Media;
    }
    public function getMediaByTypeCinema($with = [], $select = ['*'])
    {
        return $this->model()
            ->select($select)
            ->with($with)
            ->where('type', config('custom.media.type.cinema'))
            ->get();
    }
    public function getMediaByTypeMovie($with = [], $select = ['*'])
    {
        return $this->model()
            ->select($select)
            ->with($with)
            ->where('type', config('custom.media.type.movie'))
            ->get();
    }
}