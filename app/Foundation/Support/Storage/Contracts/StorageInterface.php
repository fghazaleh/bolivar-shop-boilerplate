<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/4/17
 * Time: 7:36 PM
 */

namespace App\Foundation\Support\Storage\Contracts;


interface StorageInterface {

    /**
     * @param string $key;
     * @return mixed|null;
     * */
    public function get($key);
    /**
     * @param string $key;
     * @param mixed $value;
     * @return StorageInterface;
     * */
    public function set($key,$value);
    /**
     * @return mixed[];
     * */
    public function all();
    /**
     * @param string $key;
     * @return boolean;
     * */
    public function exists($key);
    /**
     * @param string $key;
     * @return boolean;
     * */
    public function delete($key);
    /**
     * @return StorageInterface;
     * */
    public function clear();
    /**
     * @return int;
     * */
    public function count();
}