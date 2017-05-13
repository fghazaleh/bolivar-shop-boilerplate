<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/3/17
 * Time: 9:49 PM
 */

namespace App\Entity;


class Payment extends BaseModel
{
    protected $table = 'payments';

    protected $guarded = ['created_at','updated_at'];

    /**
     * @return Order;
     * */
    public function order(){
        return $this->belongsTo(Order::class);
    }
}