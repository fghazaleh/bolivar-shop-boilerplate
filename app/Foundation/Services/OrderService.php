<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/6/17
 * Time: 1:25 PM
 */

namespace App\Foundation\Services;

use App\Entity\Order;
use App\Events\OrderWasCreated;
use App\Foundation\Exceptions\DataNotFoundException;
use App\Foundation\Services\Contracts\OrderServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class OrderService extends BaseService implements OrderServiceInterface
{
    /**
     * @var Order
     */
    private $order;

    function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * @param Request $request ;
     * @param Collection $productItems
     * @return Order ;
     */
    public function create(Request $request,Collection $productItems)
    {
        $order = $this->order->create([
            'hash_order_id' => $this->generateHashOrderId(),
            'paid' => false,
            'shipping_cost' => $request->get('shipping_cost'),
            'subtotal' => $request->get('subtotal'),
            'total' => $request->get('amount'),
            'user_id' => $request->get('user_id'),
            'address_id' => $request->get('address_id'),
        ]);

        $order->orderItems()->attach($this->getOrderItems($productItems));
        event(new OrderWasCreated($order));
        return $order;
    }
    /**
     * @param int $orderId
     * */
    public function markPaid($orderId)
    {
        $this->order->where('id',$orderId)->update(['paid'=>true]);
    }

    /**
     * @param string $hashOrderId ;
     * @return Order ;
     * @throws DataNotFoundException
     */
    public function getOrderWithOrderItemsByHash($hashOrderId)
    {
        $order = $this->order->with('orderItems')
                ->where('hash_order_id', $hashOrderId)->first();
        if (!$order){
            throw new DataNotFoundException(sprintf('Order with hash# [%s] not found',$hashOrderId));
        }
        return $order;
    }
    /**
     * @param Collection $productItems;
     * @return array;
     * */
    private function getOrderItems(Collection $productItems)
    {
        $items = [];
        foreach($productItems as $product){
            $items[$product->id] = ['quantity' => $product->totalQuantity];
        }
        return $items;
    }
    /**
     * @return string;
     */
    private function generateHashOrderId()
    {
        return str_random(32);
    }

}