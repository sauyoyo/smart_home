<?php
namespace App\Repositories;
use App\Contracts\BookingRepository;
use App\Models\Booking;
use App\Repositories\AbstractRepositoryEloquent;

class BookingRepositoryEloquent extends AbstractRepositoryEloquent implements BookingrRepository
{
    public function model()
    {
        return new Booking;//khai báo tên bảng
    }
}