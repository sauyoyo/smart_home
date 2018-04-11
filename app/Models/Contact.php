<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
     use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 
        'email', 
        'phone',
        'content',
        'media_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
