<?php
namespace App\Repositories;
use App\Contracts\FeatureRepository;
use App\Models\Feature;
use App\Repositories\AbstractRepositoryEloquent;

class FeatureRepositoryEloquent extends AbstractRepositoryEloquent implements FeatureRepository
{
    public function model()
    {
        return new Feature;//khai báo tên bảng
    }
}