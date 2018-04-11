<?php
namespace App\Contracts;
use App\Contracts\AbstractRepoitory;

interface PostRepository extends AbstractRepository
{
	public function getPostByType($type, $with = [], $select = ['*']);
}