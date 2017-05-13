<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/10/17
 * Time: 11:31 AM
 */

namespace App\Foundation\Traits;

trait ProductTrait {
    /**
     * @return boolean;
     * */
    public function hasLowStock(){
        if ( $this->outOfStock() ){
            return false;
        }
        $lowStock = config('bolivar-shop.product.lowStock');
        return (bool)($this->stock <= $lowStock);
    }
    /**
     * @return boolean;
     * */
    public function outOfStock(){
        return $this->stock === 0;
    }
    /**
     * @return boolean;
     * */
    public function inStock(){
        return $this->stock >= 1;
    }
    /**
     * @param int $quantity;
     * @return boolean;
     * */
    public function hasStock($quantity){
        return $this->stock >= $quantity;
    }
}