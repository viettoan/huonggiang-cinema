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
    
}