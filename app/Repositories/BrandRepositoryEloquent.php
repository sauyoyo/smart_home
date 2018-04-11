<?php
namespace App\Repositories;
use App\Contracts\BrandRepository;
use App\Models\Brand;
use App\Repositories\AbstractRepositoryEloquent;

class BrandRepositoryEloquent extends AbstractRepositoryEloquent implements BrandRepository
{
    public function model()
    {
        return new Brand;//khai báo tên bảng
    }
}