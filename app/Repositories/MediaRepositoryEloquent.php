<?php
namespace App\Repositories;
use App\Contracts\MediaRepository;
use App\Model\Media;
use App\Repositories\AbstractRepositoryEloquent;

class MediaRepositoryEloquent extends AbstractRepositoryEloquent implements MediaRepository
{
    public function model()
    {
        return new Media;//khai báo tên bảng
    }
}