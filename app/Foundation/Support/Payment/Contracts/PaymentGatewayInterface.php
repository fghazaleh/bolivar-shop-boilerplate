<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/7/17
 * Time: 1:09 PM
 */

namespace App\Foundation\Support\Payment\Contracts;

use Illuminate\Http\Request;
use App\Foundation\Exceptions\PaymentException;
use App\Foundation\Exceptions\PaymentInvalidArgsException;

interface PaymentGatewayInterface
{

    /**
     * @return string|null;
     * @throws PaymentException
     * */
    public function getToken();

    /**
     * @param Request $request;
     * @return PaymentResponseInterface;
     * @throws PaymentException
     * @throws PaymentInvalidArgsException;
     * */
    public function charge(Request $request);
}