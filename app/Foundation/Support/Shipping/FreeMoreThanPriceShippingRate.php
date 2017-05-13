<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/10/17
 * Time: 12:44 PM
 */

namespace App\Foundation\Support\Shipping;


use App\Foundation\Services\Contracts\CartServiceInterface;
use App\Foundation\Support\Shipping\Contracts\ShippingRateInterface;

class FreeMoreThanPriceShippingRate implements ShippingRateInterface {

    /**
     * May defined here or database.
     * */
    private $minGrossTotal = 50.00;
    /**
     * @param CartServiceInterface $cartService ;
     * @return float;
     * */
    public function getShippingCost(CartServiceInterface $cartService)
    {
        return ($this->minGrossTotal <= $cartService->grossTotal())
            ?0:config('bolivar-shop.shipping.cost.default');
    }
}