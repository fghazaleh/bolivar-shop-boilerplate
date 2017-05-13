<?php

namespace App\Listeners\Payment;

use App\Events\PaymentWasFailed;
use App\Foundation\Services\Contracts\PaymentServiceInterface;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RecordFailedPayment
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
     * @param  PaymentWasFailed $event
     * @return void
     */
    public function handle(PaymentWasFailed $event)
    {
        $this->paymentService->recordFailedPayment($event->getOrder()->id);
    }
}
