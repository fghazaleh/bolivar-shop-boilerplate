<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/4/17
 * Time: 11:55 AM
 */

namespace App\Http\Controllers\Web;

use App\Foundation\Exceptions\DataNotFoundException;
use App\Http\Controllers\Controller;
use App\Foundation\Services\Contracts\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * @var ProductServiceInterface
     * */
    private $productService;

    function __construct(ProductServiceInterface $product){
        $this->productService = $product;
    }
    /**
     *
     * */
    public function index(){

        $products = $this->productService->paginate();

        return view('products.index')->with('products',$products);
    }
    public function show($productId){
        try{
            list($productId,) = explode('-',$productId);
            $product = $this->productService->getProductById($productId);
            return view('products.show')->with('product',$product);
        }catch (DataNotFoundException $e){
            return redirect()->route('product.list');
        }


    }


}