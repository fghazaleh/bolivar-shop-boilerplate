<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/7/17
 * Time: 5:40 PM
 */

namespace App\Foundation\Support\Payment\Gateways;


use App\Foundation\Support\Payment\Contracts\PaymentResponseInterface;

class BraintreePaymentResponse implements PaymentResponseInterface
{

    /**
     * @var
     */
    private $result;

    function __construct($result)
    {
        $this->result = $result;
    }
    /**
     * @return string|null;
     * */
    public function getTransactionId()
    {
        return $this->success()?$this->result->transaction->id:null;
    }

    /**
     * @return mixed;
     * */
    public function getPaymentResult()
    {
        return $this->result;
    }

    /**
     * @return mixed;
     * */
    public function toJson()
    {
        return json_encode($this->getPaymentResult());
    }
    /**
     * @return boolean;
     * */
    public function success()
    {
        return isset($this->result->success)?(bool)$this->result->success:false;
    }

    /**
     * @return string;
     * */
    public function errorMessage()
    {
        return $this->success()?'':$this->result->message;
    }
}