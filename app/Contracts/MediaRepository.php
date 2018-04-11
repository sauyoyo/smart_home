<?php
namespace App\Contracts;
use App\Contracts\AbstractRepoitory;

interface MediaRepository extends AbstractRepository
{
    public function getMediaByTypePost($with = [], $select = ['*']);
    
}