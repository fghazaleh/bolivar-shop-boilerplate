<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \App\Entity\Order;
     * */
    public function orders(){
        return $this->hasMany(Order::class);
    }

    /**
     * @return \App\Entity\Address;
     * */
    public function addresses(){
        return $this->hasMany(Address::class);
    }
}
