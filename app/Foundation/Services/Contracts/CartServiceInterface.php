<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/4/17
 * Time: 8:45 PM
 */

namespace App\Foundation\Services\Contracts;


use App\Entity\Product;
use App\Foundation\Exceptions\QuantityExceededException;
use Illuminate\Support\Collection;

interface CartServiceInterface {
    /**
     * @param Product $product
     * @param int $quantity ;
     * @return CartServiceInterface;
     * */
    public function add(Product $product, $quantity);
    /**
     * @param Product $product ;
     * @param int $quantity ;
     * @return $this
     * @throws QuantityExceededException
     */
    public function update(Product $product,$quantity);
    /**
     * @param Product $product;
     * @return mixed|null;
     * */
    public function get(Product $product);
    /**
     * @return Collection;
     * */
    public function all();
    /**
     * @return int;
     * */
    public function itemCount();
    /**
     * @param Product $product
     */
    public function remove(Product $product);
    /**
     * @param Product $product;
     * @return boolean;
     * */
    public function has(Product $product);
    /**
     * @return float;
     * */
    public function grossTotal();

    public function refresh();
    public function clear();
}