<?php
namespace App\Repositories;
use App\Contracts\PostRepository;
use App\Models\Post;
use App\Repositories\AbstractRepositoryEloquent;

class PostRepositoryEloquent extends AbstractRepositoryEloquent implements PostRepository
{
    public function model()
    {
        return new Post;
    }
    
}