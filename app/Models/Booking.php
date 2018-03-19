<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
     use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 
        'name_cus', 
        'phone',
        'email',
        'address',
        'note',
        'qty',
        'grand_total',
        'status'
    ];
}
