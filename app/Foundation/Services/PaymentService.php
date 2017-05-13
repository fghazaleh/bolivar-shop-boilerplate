<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/7/17
 * Time: 7:03 PM
 */

namespace App\Foundation\Services;


use App\Entity\Payment;
use App\Foundation\Services\Contracts\PaymentServiceInterface;

class PaymentService extends BaseService implements PaymentServiceInterface
{

    /**
     * @var Payment
     */
    private $payment;

    function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }
    /**
     * @param int $orderId ;
     * */
    public function recordFailedPayment($orderId)
    {
        $this->payment->create([
            'order_id' => $orderId,
            'failed' => true,
        ]);
    }

    /**
     * @param int $orderId ;
     * @param string $transactionId ;
     * */
    public function recordSuccessfulPayment($orderId, $transactionId)
    {
        $this->payment->create([
            'order_id' => $orderId,
            'transaction_id' => $transactionId,
            'failed' => false,
        ]);
    }
}