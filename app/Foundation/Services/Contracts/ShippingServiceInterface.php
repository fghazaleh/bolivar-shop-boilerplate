<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/11/17
 * Time: 2:57 PM
 */

namespace App\Foundation\Services\Contracts;


interface ShippingServiceInterface {

    /**
     * @return float;
     * */
    public function getShippingCost();
}