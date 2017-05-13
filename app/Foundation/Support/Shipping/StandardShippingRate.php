<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/10/17
 * Time: 12:39 PM
 */

namespace App\Foundation\Support\Shipping;


use App\Foundation\Services\Contracts\CartServiceInterface;
use App\Foundation\Support\Shipping\Contracts\ShippingRateInterface;

class StandardShippingRate implements ShippingRateInterface{

    private $defaultShippingCost = 10.00;
    /**
     * @param CartServiceInterface $cartService ;
     * @return float;
     * */
    public function getShippingCost(CartServiceInterface $cartService)
    {
        return config('bolivar-shop.shipping.cost.default',$this->defaultShippingCost);
    }
}