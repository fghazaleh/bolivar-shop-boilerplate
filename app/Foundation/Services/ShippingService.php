<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/11/17
 * Time: 2:57 PM
 */

namespace App\Foundation\Services;


use App\Foundation\Services\Contracts\CartServiceInterface;
use App\Foundation\Services\Contracts\ShippingServiceInterface;
use App\Foundation\Support\Shipping\Contracts\ShippingRateInterface;

class ShippingService extends BaseService implements ShippingServiceInterface
{
    /**
     * @var ShippingRateInterface
     */
    private $shippingRate;
    /**
     * @var CartServiceInterface
     */
    private $cartService;

    /**
     * @param ShippingRateInterface $shippingRate
     * @param CartServiceInterface $cartService
     */
    function __construct(ShippingRateInterface $shippingRate,CartServiceInterface $cartService){
        $this->shippingRate = $shippingRate;
        $this->cartService = $cartService;
    }
    /**
     * @return float;
     * */
    public function getShippingCost()
    {
        return $this->shippingRate->getShippingCost($this->cartService);
    }


}