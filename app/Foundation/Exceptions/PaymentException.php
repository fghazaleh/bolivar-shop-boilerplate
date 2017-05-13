<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/7/17
 * Time: 6:23 PM
 */

namespace App\Foundation\Exceptions;


class PaymentException extends \Exception
{
    public $errorCode = 1001;
    public $errorLabel = 'PaymentException';
}