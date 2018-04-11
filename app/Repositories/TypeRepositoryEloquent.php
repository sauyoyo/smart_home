<?php
namespace App\Repositories;
use App\Contracts\TypeRepository;
use App\Model\Type;
use App\Repositories\AbstractRepositoryEloquent;

class TypeRepositoryEloquent extends AbstractRepositoryEloquent implements TypeRepository
{
    public function model()
    {
        return new Type;//khai báo tên bảng
    }
}