<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/7/17
 * Time: 5:38 PM
 */

namespace App\Foundation\Support\Payment\Contracts;


interface PaymentResponseInterface
{
    /**
     * @return string|null;
     * */
    public function getTransactionId();

    /**
     * @return mixed;
     * */
    public function getPaymentResult();

    /**
     * @return boolean;
     * */
    public function success();
    /**
     * @return mixed;
     * */
    public function toJson();

    /**
     * @return string;
     * */
    public function errorMessage();
}