<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/4/17
 * Time: 8:35 PM
 */

namespace App\Foundation\Exceptions;


class QuantityExceededException extends \Exception{

    public $errorCode = 102;
    public $errorLabel = 'QuantityExceeded';
}