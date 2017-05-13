<?php

namespace App\Entity;


use App\Foundation\Traits\ProductTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends BaseModel
{
    use SoftDeletes;
    use ProductTrait;

    protected $table = 'products';

    protected $guarded = ['created_at','updated_at','deleted_at'];

    /**
     * @return Order;
     * */
    public function orderItems(){
        return $this->belongsToMany(Order::class,'order_items');
    }
}
