<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'phone',
        'gender',
        'address',
        'role',
        'avatar'

    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*Check admin*/
    
    public function isAdmin()
    {
        return $this->role == 1;
    }
    public function getAvatarAttribute($value)/*hàm get để gọi giá trị ra, get(tên cột) Attribute*/
    {
        //$value = <default-image class="ipg">
        return asset(config('custom.defaultPath') . $value);
    }

    public function setPasswordAttribute($value)//set quy định dữ liệu đc lưu trong bảng
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
