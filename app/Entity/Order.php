<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/3/17
 * Time: 9:31 PM
 */

namespace App\Entity;

class Order extends BaseModel
{
    protected $table = 'orders';

    protected $guarded = ['created_at','updated_at'];

    /**
     * @return User;
     * */
    public function customer(){
        return $this->belongsTo(User::class);
    }
    /**
     * @return Address;
     * */
    public function address(){
        return $this->belongsTo(Address::class);
    }
    /**
     * @return Payment;
     * */
    public function payment(){
        return $this->hasOne(Payment::class,'order_id');
    }
    /**
     * @return OrderItems
     * */
    public function orderItems(){
        return $this->belongsToMany(Product::class,'order_items')->withPivot('quantity');
    }

}
