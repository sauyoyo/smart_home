<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
     use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'description', 
        'content',
        'start',
        'end',
        'sale',
        'status'

    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
