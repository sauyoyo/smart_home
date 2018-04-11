<?php
namespace App\Contracts;
use App\Contracts\AbstractRepoitory;

interface UserRepository extends AbstractRepository
{
	public function search($keyword, $with=[], $select = '*');
}