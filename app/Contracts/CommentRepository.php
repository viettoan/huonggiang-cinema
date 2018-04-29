<?php
namespace App\Contracts;
use App\Contracts\AbstractRepository;

interface CommentRepository extends AbstractRepository
{
    public function getCommentByOption($commentable_id, $commentable_type, $option, $with = [], $select = '*');
}
