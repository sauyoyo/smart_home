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
        'qty',
        'brand_id',
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
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
}
