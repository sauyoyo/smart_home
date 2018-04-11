<?php
namespace App\Repositories;
use App\Contracts\PromotionRepository;
use App\Models\Promotion;
use App\Repositories\AbstractRepositoryEloquent;

class PromotionRepositoryEloquent extends AbstractRepositoryEloquent implements PromotionRepository
{
    public function model()
    {
        return new Promotion;//khai báo tên bảng
    }
}