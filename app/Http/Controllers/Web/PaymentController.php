<?php

namespace App\Http\Controllers\Web;

use App\Foundation\Exceptions\PaymentException;
use App\Foundation\Services\Contracts\PaymentServiceInterface;
use App\Http\Controllers\Controller;
use App\Foundation\Support\Payment\Contracts\PaymentGatewayInterface;

class PaymentController extends Controller
{

    /**
     * @var PaymentGatewayInterface
     */
    private $paymentGateway;

    function __construct(PaymentGatewayInterface $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }
    /**
     * @description: Used to generate token for payment gateway.
     * @route('/api/payment/token.json');
     * @todo list: need to refactor.
     * */
    public function token()
    {
        try {
            $response = ['error'=>false,'token' => $this->paymentGateway->getToken()];
            return response()->json($response);
        }catch (PaymentException $e){
            $response = ['error'=>true, 'message'=>$e->getMessage()];
            return response()->json($response,400);
        }
    }
}
