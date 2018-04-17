<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    
    protected $fillable = [
        'path',
        'description',
        'status',
        'type',
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function post()
    {
        return $this->hasMany(Post::class);
    }
    public function getpathAttribute($value)
    {
        return asset(config('custom.defaultMedia') . $value); 
    }
    

}
