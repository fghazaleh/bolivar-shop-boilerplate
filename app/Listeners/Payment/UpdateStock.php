<?php

namespace App\Listeners\Payment;

use App\Entity\Product;
use App\Events\PaymentWasSuccessful;
use App\Foundation\Services\Contracts\ProductServiceInterface;


class UpdateStock
{
    /**
     * @var ProductServiceInterface
     */
    private $productService;

    /**
     * Create the event listener.
     *
     * @param ProductServiceInterface $productService
     */
    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Handle the event.
     *
     * @param  PaymentWasSuccessful $event
     * @return void
     */
    public function handle(PaymentWasSuccessful $event)
    {
        foreach ($event->getProductItems()->all() as $product) {
            $this->productService->updateStock(
                $product->id,
                $this->decreaseStock($product));
        }
    }
    /**
     * @param Product $product;
     * @return int;
     * */
    private function decreaseStock(Product $product){
        return $product->stock - $product->totalQuantity;
    }
}
