<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/7/17
 * Time: 7:03 PM
 */

namespace App\Foundation\Services\Contracts;


interface PaymentServiceInterface
{
    /**
     * @param int $orderId;
     * */
    public function recordFailedPayment($orderId);
    /**
     * @param int $orderId;
     * @param string $transactionId;
     * */
    public function recordSuccessfulPayment($orderId,$transactionId);
}