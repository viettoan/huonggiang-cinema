<?php
namespace App\Repositories;

abstract class AbstractRepositoryEloquent
{
    abstract public function model();
    public function make($with = [])
    {
        return $this->model()->with($with);
    }
    public function all($with = [], $select = ['*'])
    {
        return $this->make($with)->orderBy('updated_at', 'DESC')->get($select);
    }
    public function paginate($paginate, $with = [], $select = ['*'])
    {
        return $this->make($with)->orderBy('updated_at', 'DESC')->paginate($paginate, $select);
    }
    public function find($id, $with = [], $select = ['*'])
    {
        return $this->make($with)->find($id);
    }
    public function create($data = [])
    {
        return $this->model()->create($data);
    }
    public function update($id, $data = [])
    {
        if ($a = $this->find($id, [], ['id'])) {
            return $a->update($data);
        }
        return false;
    }
    public function delete($id)
    {
        return $this->model()->destroy($id);
    }
    public function deleteItem($data = [])
    {
        return $this->model()->destroy($data);
    }
}