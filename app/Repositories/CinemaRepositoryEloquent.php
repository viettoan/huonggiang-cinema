<?php
namespace App\Repositories;
use App\Contracts\CategoryRepository;
use App\Models\Category;
class CategoryRepositoryEloquent extends AbstractRepositoryEloquent implements CategoryRepository
{
    public function model()
    {
        return new Category;
    }
    
}