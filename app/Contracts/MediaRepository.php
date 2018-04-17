<?php
namespace App\Contracts;
use App\Contracts\AbstractRepoitory;

interface MediaRepository extends AbstractRepository
{
    public function getMediaByTypePost($with = [], $select = ['*']);
    public function getMediaByTypeProduct($with =[], $select = ['*']);
    public function getMediaByTypeBrand($with =[], $elect = ['*']);
    
}