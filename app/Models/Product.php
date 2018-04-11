<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 
        'description', 
        'status',
        'price',
        'type_id',
        'qty',
        'brand_id',
        'promption_id',
        'booking_id',
        'rating_id',
        'media_id'

    ];
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function types()
    {
        return $this->hasMany(Type::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function medias()
    {
        return $this->hasMany(Media::class);
    }
    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
}
