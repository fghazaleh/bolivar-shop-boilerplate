<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/3/17
 * Time: 9:36 PM
 */

namespace App\Foundation\Services\Contracts;

interface ProductServiceInterface
{

    /**
     * @return \App\Entity\Product;
     * */
    public function paginate();
    /**
     * @param int $id;
     * @return \App\Entity\Product;
     * @throws \App\Foundation\Exceptions\DataNotFoundException
     * */
    public function getProductById($id);
    /**
     * @param array $ids;
     * @return \App\Entity\Product;
     * */
    public function getProductsByIds(array $ids);

    /**
     * @param int $id;
     * @param int $quantity;
     * */
    public function updateStock($id,$quantity);
}