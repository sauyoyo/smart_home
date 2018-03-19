<?php
namespace App\Repositories;
use App\Contracts\RatingRepository;
use App\Model\Rating;
use App\Repositories\AbstractRepositoryEloquent;

class RatingRepositoryEloquent extends AbstractRepositoryEloquent implements RatingRepository
{
    public function model()
    {
        return new Rating;//khai báo tên bảng
    }
}