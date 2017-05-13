<?php

namespace App\Listeners\Payment;

use App\Events\PaymentWasSuccessful;
use App\Foundation\Services\Contracts\PaymentServiceInterface;


class RecordSuccessfulPayment
{
    /**
     * @var PaymentServiceInterface
     */
    private $paymentService;

    /**
     * @param PaymentServiceInterface $paymentService
     */
    function __construct(PaymentServiceInterface $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    /**
     * Handle the event.
     *
     * @param  PaymentWasSuccessful  $event
     * @return void
     */
    public function handle(PaymentWasSuccessful $event)
    {
        $this->paymentService
            ->recordSuccessfulPayment(
                $event->getOrder()->id,
                $event->getPaymentResponse()->getTransactionId()
            );
    }
}
