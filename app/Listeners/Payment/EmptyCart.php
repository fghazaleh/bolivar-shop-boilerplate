<?php

namespace App\Listeners\Payment;

use App\Events\OrderWasCreated;
use App\Events\PaymentWasSuccessful;
use App\Foundation\Services\Contracts\CartServiceInterface;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmptyCart
{
    /**
     * @var CartServiceInterface
     */
    private $basketService;

    /**
     * Create the event listener.
     * @param CartServiceInterface $basketService
     */
    public function __construct(CartServiceInterface $basketService)
    {
        $this->basketService = $basketService;
    }

    /**
     * Handle the event.
     *
     * @param  PaymentWasSuccessful  $event
     * @return void
     */
    public function handle(PaymentWasSuccessful $event)
    {
        $this->basketService->clear();
    }
}
