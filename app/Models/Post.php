<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 
        'description', 
        'content',
        'status',
        'media_id',
        'user_id',
        'type'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function media()
    {
       return $this->belongsTo(Media::class);
    }

}
