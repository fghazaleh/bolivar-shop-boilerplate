<?php

namespace App\Http\Controllers\Web;


use App\Events\PaymentWasFailed;
use App\Events\PaymentWasSuccessful;
use App\Foundation\Exceptions\DataNotFoundException;
use App\Foundation\Exceptions\PaymentException;
use App\Foundation\Exceptions\EmailAlreadyExistExceptions;
use App\Foundation\Exceptions\PaymentInvalidArgsException;
use App\Foundation\Services\Contracts\AddressServiceInterface;
use App\Foundation\Services\Contracts\ShippingServiceInterface;
use App\Foundation\Support\Payment\Contracts\PaymentGatewayInterface;
use App\Foundation\Support\Payment\Providers\BraintreePaymentResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlaceOrderRequest;
use App\Foundation\Services\Contracts\UserServiceInterface;
use App\Foundation\Services\Contracts\OrderServiceInterface;
use App\Foundation\Services\Contracts\CartServiceInterface;
use Illuminate\Http\Request;


class OrderController extends Controller
{

    /**
     * @var OrderServiceInterface
     */
    private $orderService;
    /**
     * @var CartServiceInterface
     * */
    private $cartService;

    function __construct(OrderServiceInterface $orderService,
                         CartServiceInterface $cartService)
    {
        $this->orderService = $orderService;
        $this->cartService = $cartService;
    }

    /**
     * @route('/order');
     * */
    public function index()
    {
        $this->guardFromEmptyBasket();
        return view('order.index')
            ->with('cartService', $this->cartService);
    }

    /**
     * @route('/order/place-order');
     * @param PlaceOrderRequest $request
     * @param UserServiceInterface $userService
     * @param AddressServiceInterface $addressService
     * @param PaymentGatewayInterface $paymentGateway
     * @param ShippingServiceInterface $shippingService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function placeOrder(PlaceOrderRequest $request,
                               UserServiceInterface $userService,
                               AddressServiceInterface $addressService,
                               PaymentGatewayInterface $paymentGateway,
                               ShippingServiceInterface $shippingService
    )
    {
        try {
            $this->guardFromEmptyBasket();
            $request->merge([
                'subtotal' => $this->cartService->grossTotal(),
                'shipping_cost' => $shippingService->getShippingCost()
            ]);
            $request['amount'] = $this->cartService->grossTotal() + $shippingService->getShippingCost();
            //--@create a new customer;
            $user = $userService->create($request);
            $request['user_id'] = $user->id;
            //--@create a new address for registered customer
            $address = $addressService->create($request);
            $request['address_id'] = $address->id;
            $productItems = $this->cartService->all();
            //--@create a new order with order items;
            $order = $this->orderService->create($request, $productItems);
            //--@charge customer the order.
            $paymentResult = $paymentGateway->charge($request);
            if (!$paymentResult->success()) {
                event(new PaymentWasFailed($order));
                return redirect()->route('order.index')
                    ->withInput($request->all())
                    ->withErrors('Unable to continue the checkout, The payment failed.');
            }
            event(new PaymentWasSuccessful($order, $productItems, $paymentResult));
            return redirect()->route('order.show', [$order->hash_order_id]);

        } catch (EmailAlreadyExistExceptions $e) {
            return redirect()->route('order.index')
                ->withInput($request->all())
                ->withErrors($e->getMessage());
        } catch (PaymentInvalidArgsException $e) {
            return redirect()->route('order.index')
                ->withInput($request->all())
                ->withErrors('Unable to continue the checkout, The payment failed.');
        } catch (PaymentException $e) {
            return redirect()->route('order.index')
                ->withInput($request->all())
                ->withErrors('Unable to continue the checkout, The payment failed.');
        }
    }

    /**
     * @route('/order/{$hashOrderId}');
     * @param string $hashOrderId ;
     * @param UserServiceInterface $userService
     * @param AddressServiceInterface $addressService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($hashOrderId,
                         UserServiceInterface $userService,
                         AddressServiceInterface $addressService)
    {
        try {
            $order = $this->orderService->getOrderWithOrderItemsByHash($hashOrderId);
            $customer = $userService->getById($order->user_id);
            $address = $addressService->getById($order->address_id);

            return view('order.show',compact('order','customer','address'));
        } catch (DataNotFoundException $e) {
            return redirect()
                ->home()
                ->withErrors($e->getMessage());
        }
    }

    /**
     * Used to determine if the cart is empty then redirect to order page.
     * */
    private function guardFromEmptyBasket()
    {
        $this->cartService->refresh();
        if ($this->cartService->grossTotal() == 0) {
            return redirect()->route('product.list')
                ->send();

        }

    }
}
