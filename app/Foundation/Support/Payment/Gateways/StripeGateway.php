<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/8/17
 * Time: 6:48 PM
 */

namespace App\Foundation\Support\Payment\Gateways;


use Illuminate\Http\Request;
use App\Foundation\Exceptions\PaymentException;
use App\Foundation\Exceptions\PaymentInvalidArgsException;
use App\Foundation\Support\Payment\Contracts\PaymentGatewayInterface;
use App\Foundation\Support\Payment\Contracts\PaymentResponseInterface;
use Stripe\Stripe;

class StripeGateway implements PaymentGatewayInterface{


    function __construct(){
        try{
            $config = config('bolivar-shop.payment.provider.config');
            Stripe::setApiKey($config['API_KEY']);
        }catch (\Exception $e){
            throw new PaymentException($e);
        }

    }
    /**
     * @return string|null;
     * @throws PaymentException
     * */
    public function getToken()
    {
        return null;
    }

    /**
     * @param Request $request ;
     * @return PaymentResponseInterface;
     * @throws PaymentException
     * @throws PaymentInvalidArgsException;
     * */
    public function charge(Request $request)
    {
        // TODO: Implement charge() method.
    }
}