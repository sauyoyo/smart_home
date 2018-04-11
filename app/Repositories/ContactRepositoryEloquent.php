<?php
namespace App\Repositories;
use App\Contracts\ContactRepository;
use App\Model\Contact;
use App\Repositories\AbstractRepositoryEloquent;

class ContactRepositoryEloquent extends AbstractRepositoryEloquent implements ContactRepository
{
    public function model()
    {
        return new Contact;//khai báo tên bảng
    }
}