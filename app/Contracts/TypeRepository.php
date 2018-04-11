<?php
namespace App\Contracts;
use App\Contracts\AbstractRepoitory;

interface TypeRepository extends AbstractRepository
{
    public function getTypeByMedia($with = [], $select = ['*']);
    public function getTypeByPost($with = [], $select = ['*']);
}