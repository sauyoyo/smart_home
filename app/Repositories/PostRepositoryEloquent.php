<?php
namespace App\Repositories;
use App\Contracts\PostRepository;
use App\Models\Post;
use App\Repositories\AbstractRepositoryEloquent;

class PostRepositoryEloquent extends AbstractRepositoryEloquent implements PostRepository
{
    public function model()
    {
        return new Post;
    }
    
    public function getPostByType($type, $with = [], $select = ['*'])
    {
        return $this->model()->select($select)->with($with)->where('type', $type)->where('status', config('custom.post.status.show'))->get();
    }
}