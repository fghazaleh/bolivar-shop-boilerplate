<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/3/17
 * Time: 9:37 PM
 */

namespace App\Foundation\Services;

use App\Entity\Product;
use App\Foundation\Exceptions\DataNotFoundException;
use App\Foundation\Services\Contracts\ProductServiceInterface;

class ProductService extends BaseService implements ProductServiceInterface{

    /**
     * @var \App\Entity\Product;
     * */
    protected $product;

    function __construct(Product $product){
        $this->product = $product;
    }

    /**
     * @return \App\Entity\Product;
     * */
    public function paginate()
    {
        return $this->product->paginate();
    }

    /**
     * @param int $id
     * @return Product ;
     * @throws DataNotFoundException
     */
    public function getProductById($id)
    {
        $product = $this->product->where('id',$id)->first();
        if (!$product){
            throw new DataNotFoundException(sprintf('Product #Id [%s] not found',$id));
        }
        return $product;
    }

    /**
     * @param array $ids ;
     * @return \App\Entity\Product;
     * */
    public function getProductsByIds(array $ids)
    {
        return $this->product->find($ids);
    }

    /**
     * @param int $id ;
     * @param int $quantity ;
     * */
    public function updateStock($id, $quantity)
    {
        $this->product->where('id',$id)->update(['stock' => $quantity]);
    }
}