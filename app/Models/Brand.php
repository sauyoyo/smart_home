<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
     use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'description',
        'media_id'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function media()
    {
        return $this->hasMany(Media::class);
    }
}
