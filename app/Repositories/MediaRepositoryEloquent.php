<?php
namespace App\Repositories;
use App\Contracts\MediaRepository;
use App\Models\Media;
use App\Repositories\AbstractRepositoryEloquent;

class MediaRepositoryEloquent extends AbstractRepositoryEloquent implements MediaRepository
{
    public function model()
    {
        return new Media;
    }
    public function getMediaByTypePost($with = [], $select = ['*'])
    {
        return $this->model()
            ->select($select)
            ->with($with)
            ->where('type', config('custom.media.type.post'))
            ->get();
    }
    // public function getMediaByTypeProduct($with = [], $select = ['*'])
    // {
    //     return $this->model()
    //     ->select($select)
    //     ->with($with)
    //     ->where('type', config('custom.media.type.product'))
    //     ->get();
    // }
}