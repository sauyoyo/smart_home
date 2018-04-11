<?php
namespace App\Repositories;
use App\Contracts\UserRepository;
use App\Models\User;
use App\Repositories\AbstractRepositoryEloquent;

class UserRepositoryEloquent extends AbstractRepositoryEloquent implements UserRepository
{
    public function model()
    {
        return new User;//khai báo tên bảng
    }
    public function search($keyword, $with = [], $select ='*')
    {
        return $this->model()
        ->with($with)
        ->select($select)
        ->where('name', 'like', '%' .$keyword . '%')
        ->paginate(5);
    }
}