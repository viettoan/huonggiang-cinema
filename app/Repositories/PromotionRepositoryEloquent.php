<?php
namespace App\Repositories;
use App\Contracts\PromotionRepository;
use App\Models\Promotion;
use App\Repositories\AbstractRepositoryEloquent;

class PromotionRepositoryEloquent extends AbstractRepositoryEloquent implements PromotionRepository
{
    public function model()
    {
        return new Promotion;
    }
    public function getPromotionByStatus($status, $with = [], $select = ['*'])
    {
        return $this->model()->select($select)->with($with)->where('status', $status)->get();
    }

     public function search($keyword, $with = [], $select = '*')
    {
        return $this->model()
            ->with($with)
            ->select($select)
            ->where('start', 'like', '%' . $keyword . '%')
            ->orwhere('end', 'like', '%' . $keyword . '%')
            ->paginate(10);
    }
}