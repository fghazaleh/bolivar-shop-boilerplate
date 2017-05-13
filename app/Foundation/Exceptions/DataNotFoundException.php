<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/4/17
 * Time: 7:01 PM
 */

namespace App\Foundation\Exceptions;


class DataNotFoundException extends \Exception{

    public $errorCode = 101;
    public $errorLabel = 'DataNotFound';


}