<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/7/17
 * Time: 12:40 PM
 */

namespace App\Foundation\Support\Payment\Gateways;

use App\Foundation\Exceptions\PaymentException;
use Braintree_ClientToken;
use Braintree_Transaction;
use Braintree_Configuration;

use Illuminate\Http\Request;
use App\Foundation\Exceptions\PaymentInvalidArgsException;
use App\Foundation\Support\Payment\Contracts\PaymentResponseInterface;
use App\Foundation\Support\Payment\Contracts\PaymentGatewayInterface;

class BraintreeGateway implements PaymentGatewayInterface{


    function __construct(){
        try {
            $config = config('bolivar-shop.payment.gateway.config');
            Braintree_Configuration::environment($config['environment']);
            Braintree_Configuration::merchantId($config['merchantId']);
            Braintree_Configuration::publicKey($config['publicKey']);
            Braintree_Configuration::privateKey($config['privateKey']);
        }catch (\Exception $e){
            throw new PaymentException($e);
        }
    }

    /**
     * @return string ;
     * @throws PaymentException
     */
    public function getToken()
    {
        try {
            return Braintree_ClientToken::generate();
        }catch (\Exception $e){
            throw new PaymentException($e);
        }
    }

    /**
     * @param Request $request ;
     * @return PaymentResponseInterface ;
     * @throws PaymentException
     * @throws PaymentInvalidArgsException;
     */
    public function charge(Request $request)
    {
        if ($request->get('payment_method_nonce') == null){
            throw new PaymentInvalidArgsException(sprintf("Payment arguments are required."));
        }
        try{
            $result = Braintree_Transaction::sale([
                'amount' => $request->get('amount'),
                'paymentMethodNonce' => $request->get('payment_method_nonce'),
                'options' => [
                    'submitForSettlement' => True
                ]
            ]);
            return new BraintreePaymentResponse($result);
        }catch (\Exception $e){
           throw new PaymentException($e);
        }
    }
}