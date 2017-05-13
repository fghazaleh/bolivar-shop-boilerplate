<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/11/17
 * Time: 12:19 PM
 */

if (! function_exists('money')) {
    /**
     * Generate an format price
     *
     * @param  float $price
     * @param  int $decimals
     * @return float
     */
    function money($price,$decimals = 2)
    {
        return number_format($price,$decimals);
    }
}
if (! function_exists('slug')) {
    /**
     * Generate an format price
     *
     * @param mixed $object
     * @return string
     */
    function slug($object)
    {
        $id = isset($object->id)?$object->id:'';
        $title = isset($object->title)?$object->title:'';
        return str_slug($id.'-'.$title);
    }
}