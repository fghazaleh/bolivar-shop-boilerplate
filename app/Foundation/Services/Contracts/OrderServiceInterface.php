<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/6/17
 * Time: 1:24 PM
 */

namespace App\Foundation\Services\Contracts;


use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface OrderServiceInterface {

    /**
     * @param Request $request ;
     * @param Collection $productItems
     * @return \App\Entity\Order ;
     */
    public function create(Request $request,Collection $productItems);
    /**
     * @param int $orderId
     * */
    public function markPaid($orderId);

    /**
     * @param string $hashOrderId;
     * @return \App\Entity\Order ;
     * */
    public function getOrderWithOrderItemsByHash($hashOrderId);
}