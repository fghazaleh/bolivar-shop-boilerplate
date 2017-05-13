<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/6/17
 * Time: 7:38 PM
 */

namespace App\Foundation\Exceptions;


class EmailAlreadyExistExceptions extends \Exception{
    public $errorCode = 103;
    public $errorLabel = 'EmailAlreadyExist';

}