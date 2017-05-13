<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/3/17
 * Time: 9:30 PM
 */

namespace App\Entity;

use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends BaseModel
{
    use SoftDeletes;

    protected $table = 'addresses';

    protected $guarded = ['created_at','updated_at','deleted_at'];

    /**
     * @return User;
     * */
    public function customer(){
        return $this->belongsTo(User::class);
    }

    /**
     * @return Order;
     * */
    public function order(){
        return $this->belongsTo(Order::class);
    }
}
