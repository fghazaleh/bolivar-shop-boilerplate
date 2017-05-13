<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/10/17
 * Time: 12:00 PM
 */

namespace App\Foundation\Support\Shipping\Contracts;


use App\Foundation\Services\Contracts\CartServiceInterface;

interface ShippingRateInterface {

    /**
     * @param CartServiceInterface $cartService;
     * @return float;
     * */
    public function getShippingCost(CartServiceInterface $cartService);

}