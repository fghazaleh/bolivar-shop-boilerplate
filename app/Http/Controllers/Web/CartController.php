<?php

namespace App\Http\Controllers\Web;

use App\Foundation\Exceptions\DataNotFoundException;
use App\Foundation\Exceptions\QuantityExceededException;
use App\Foundation\Services\Contracts\CartServiceInterface;
use App\Foundation\Services\Contracts\ProductServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class CartController extends Controller
{

    /**
     * @var CartServiceInterface
     */
    private $cartService;
    /**
     * @var ProductServiceInterface
     */
    private $productService;

    function __construct(CartServiceInterface $cartService,
                         ProductServiceInterface $productService)
    {
        $this->cartService = $cartService;
        $this->productService = $productService;
    }

    public function index()
    {
        $this->cartService->refresh();
        return view('cart.index')
            ->with('cartService', $this->cartService);
    }

    /**
     * @method(get)
     * @param string $productId ;
     * @param int $quantity ;
     * @return Response
     */
    public function add($productId, $quantity)
    {
        try {
            $productId = $this->getProductId($productId);
            $product = $this->productService->getProductById($productId);
            $this->cartService->add($product, $quantity);
            return redirect()->route('cart');
        } catch (DataNotFoundException $e) {
            return redirect()->route('product.list')->withErrors($e->getMessage());
        } catch (QuantityExceededException $e) {
            return redirect()->route('product.list')->withErrors($e->getMessage());
        } catch (\Exception $e) {
            return redirect()->route('product.list')->withErrors($e->getMessage());
        }
    }
    /**
     * @method PUT
     * @param int $productId ;
     * @param Request $request;
     * @return Response
     */
    public function putCartItem($productId,Request $request)
    {
        try {
            $product = $this->productService->getProductById($productId);
            $this->cartService->update($product,$request->get('quantity',0));
            return redirect()->route('cart');
        } catch (DataNotFoundException $e) {
            return redirect()->route('product.list')->withErrors($e->getMessage());
        } catch (QuantityExceededException $e) {
            return redirect()->route('product.list')->withErrors($e->getMessage());
        }
    }
    /**
     * @method DELETE
     * @param int $productId;
     * @return Response
     */
    public function deleteCartItem($productId){
        try {
            $productId = $this->getProductId($productId);
            $product = $this->productService->getProductById($productId);
            $this->cartService->update($product,0);
            return redirect()->route('cart');
        } catch (DataNotFoundException $e) {
            return redirect()->route('product.list')->withErrors($e->getMessage());
        }
    }

    /**
     * @description: Used to parse the product with slug and return product id
     * @param string $productWithSlug;
     * @return int;
     * */
    private function getProductId($productWithSlug){
        list($productId,) = explode('-', $productWithSlug);
        return $productId;
    }
}
