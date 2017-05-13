<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/4/17
 * Time: 7:58 PM
 */

namespace App\Foundation\Services;

use App\Entity\Product;
use App\Foundation\Exceptions\DataNotFoundException;
use App\Foundation\Exceptions\QuantityExceededException;
use App\Foundation\Services\Contracts\CartServiceInterface;
use App\Foundation\Services\Contracts\ProductServiceInterface;
use App\Foundation\Support\Storage\Contracts\StorageInterface;
use Illuminate\Database\Eloquent\Collection;

class CartService extends BaseService implements CartServiceInterface
{
    /**
     * @var StorageInterface
     */
    private $storage;
    /**
     * @var ProductServiceInterface
     */
    private $productService;

    function __construct(StorageInterface $storage, ProductServiceInterface $productService)
    {
        $this->storage = $storage;
        $this->productService = $productService;
    }

    /**
     * @param Product $product
     * @param int $quantity ;
     * @return CartServiceInterface;
     * */
    public function add(Product $product, $quantity)
    {
        if ($this->has($product)) {
            $currentProduct = $this->get($product);
            $quantity += $currentProduct->totalQuantity;
        }
        return $this->update($product, $quantity);
    }

    /**
     * @param Product $product ;
     * @param int $quantity ;
     * @return $this
     * @throws DataNotFoundException
     * @throws QuantityExceededException
     * @throws \Exception
     */
    public function update(Product $product, $quantity)
    {
        try {
            if (!$this->productService->getProductById($product->id)->hasStock($quantity)) {
                throw new QuantityExceededException;
            }
        } catch (DataNotFoundException $e) {
            throw $e;
        }
        if ($quantity == 0) {
            $this->remove($product);
            return $this;
        }
        $this->storage->set($product->id, $this->newProductItemEntity($product, $quantity));
        return $this;
    }

    /**
     * @param Product $product ;
     * @return mixed|null;
     * */
    public function get(Product $product)
    {
        return $this->storage->get($product->id);
    }

    /**
     * @return Collection;
     * */
    public function all()
    {
        $ids = [];
        foreach ($this->storage->all() as $product) {
            array_push($ids, $product->productId);
        }
        $items = new Collection();
        $products = $this->productService->getProductsByIds($ids);
        foreach ($products as $product) {
            $productBasketItem = $this->get($product);
            $product->totalQuantity += $productBasketItem->totalQuantity;
            $product->totalPrice += $productBasketItem->totalPrice;
            $items->add($product);
        }
        return $items;
    }

    /**
     * @return int;
     * */
    public function itemCount()
    {
        return $this->storage->count();
    }

    public function clear()
    {
        $this->storage->clear();
    }

    /**
     * @param Product $product
     */
    public function remove(Product $product)
    {
        $this->storage->delete($product->id);
    }

    /**
     * @param Product $product ;
     * @return boolean;
     * */
    public function has(Product $product)
    {
        return $this->storage->exists($product->id);
    }

    public function refresh()
    {
        $items = $this->all();
        foreach($items as $item){
            if ( !$item->hasStock($item->totalQuantity) ){
                $this->update($item,$item->stock);
            }
        }
    }
    /**
     * @return float;
     * */
    public function grossTotal()
    {
        $totalPrice = 0;
        $items = $this->all();
        foreach($items as $item){
            if ($item->outOfStock()){
                continue;
            }
            $totalPrice+=$item->totalPrice;
        }
        return $totalPrice;
    }

    /**
     * @param Product $product
     * @param $quantity
     * @return \stdClass ;
     */
    protected function newProductItemEntity(Product $product, $quantity)
    {
        $item = new \stdClass();
        $item->productId = (int)$product->id;
        $item->totalQuantity = (int)$quantity;
        $item->totalPrice = $quantity * $product->price;
        return $item;
    }

}