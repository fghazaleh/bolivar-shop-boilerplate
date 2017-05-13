<?php

namespace App\Listeners\Payment;


use App\Events\PaymentWasSuccessful;
use App\Foundation\Services\Contracts\OrderServiceInterface;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MarkOrderPaid
{
    /**
     * @var OrderServiceInterface
     */
    private $orderService;

    /**
     * Create the event listener.
     *
     * @param OrderServiceInterface $orderService
     */
    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Handle the event.
     *
     * @param  PaymentWasSuccessful  $event
     * @return void
     */
    public function handle(PaymentWasSuccessful $event)
    {
        $this->orderService->markPaid($event->getOrder()->id);
    }
}
