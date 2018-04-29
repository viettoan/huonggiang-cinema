<?php
namespace App\Repositories;
use App\Contracts\CommentRepository;
use App\Models\Comment;

class CommentRepositoryEloquent extends AbstractRepositoryEloquent implements CommentRepository
{
    public function model()
    {
        return new Comment;
    }

    public function getCommentByOption($commentable_id, $commentable_type, $option, $with = [], $select = '*')
    {
        return $this->model()
            ->select($select)
            ->with($with)
            ->where('commentable_id', $commentable_id)
            ->where('commentable_type', $commentable_type)
            ->orderBy('created_at', $option)
            ->get();
    }
}