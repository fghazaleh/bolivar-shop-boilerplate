<?php

namespace App\Events;

use App\Entity\Order;
use App\Entity\OrderItem;
use App\Foundation\Services\Contracts\PaymentServiceInterface;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PaymentWasFailed
{
    use InteractsWithSockets, SerializesModels;
    /**
     * @var PaymentServiceInterface
     */
    private $paymentService;
    /**
     * @var array
     */
    public $attributes;
    /**
     * @var Order
     */
    private $order;

    /**
     * Create a new event instance.
     * @param Order $order;
     */
    function __construct(Order $order)
    {
        $this->order = $order;
    }
    /**
     * @return Order;
     * */
    public function getOrder()
    {
        return $this->order;
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
