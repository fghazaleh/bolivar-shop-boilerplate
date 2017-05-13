<?php

namespace App\Events;

use App\Entity\Order;

use App\Foundation\Support\Payment\Contracts\PaymentResponseInterface;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Collection;

class PaymentWasSuccessful
{
    use InteractsWithSockets, SerializesModels;
    /**
     * @var Order
     */
    private $order;
    /**
     * @var PaymentResponseInterface
     */
    private $paymentResponse;
    /**
     * @var Collection
     */
    private $productItems;

    /**
     * Create a new event instance.
     * @param Order $order
     * @param Collection $productItems
     * @param PaymentResponseInterface $paymentResponse
     */
    public function __construct(Order $order,Collection $productItems,PaymentResponseInterface $paymentResponse)
    {
        $this->order = $order;
        $this->paymentResponse = $paymentResponse;
        $this->productItems = $productItems;
    }
    /**
     * @return Order;
     * */
    public function getOrder()
    {
        return $this->order;
    }
    /**
     * @return Collection[Product];
     * */
    public function getProductItems()
    {
        return $this->productItems;
    }
    /**
     * @return PaymentResponseInterface;
     * */
    public function getPaymentResponse()
    {
        return $this->paymentResponse;
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
