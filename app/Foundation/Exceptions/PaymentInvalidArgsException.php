<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/7/17
 * Time: 5:32 PM
 */

namespace App\Foundation\Exceptions;


class PaymentInvalidArgsException extends \InvalidArgumentException
{
    public $errorCode = 1002;
    public $errorLabel = 'PaymentInvalidArgument';
}