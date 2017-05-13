<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/4/17
 * Time: 7:37 PM
 */

namespace App\Foundation\Support\Storage\Provider;


use App\Foundation\Support\Storage\Contracts\StorageInterface;

class SessionStorage implements StorageInterface
{
    /**
     * @var string
     * */
    private $bucketId;
    /**
     * @var \Illuminate\Session\SessionInterface
     * */
    private $session;

    function __construct($bucketId = 'defaultBucketId')
    {
        $this->session = session();
        if (!$this->session->exists($bucketId)) {
            $this->setAll([]);
        }
        $this->bucketId = $bucketId;
    }

    /**
     * @param string $key ;
     * @return mixed|null;
     * */
    public function get($key)
    {
        if (!$this->exists($key)) {
            return null;
        }
        return $this->getItem($key);
    }

    /**
     * @param string $key ;
     * @param mixed $value ;
     * @return StorageInterface;
     * */
    public function set($key, $value)
    {
        $this->setItem($key, $value);
        return $this;
    }

    /**
     * @return mixed[];
     * */
    public function all()
    {
        return $this->session->get($this->bucketId,[]);
    }

    /**
     * @param string $key ;
     * @return boolean;
     * */
    public function exists($key)
    {
        return $this->itemExists($key);
    }

    /**
     * @param string $key ;
     * @return boolean;
     * */
    public function delete($key)
    {
        if (!$this->exists($key)) {
            return false;
        }
        $values = $this->all();
        unset($values[$key]);
        $this->setAll($values);
    }

    /**
     * @return StorageInterface;
     * */
    public function clear()
    {
        $this->session->remove($this->bucketId);
        $this->session->save();
        return $this;
    }

    /**
     * @return int;
     * */
    public function count()
    {
        return count($this->all());
    }

    /**
     * @return boolean;
     * */
    protected function itemExists($key)
    {
        $values = $this->all();
        return isset($values[$key]);
    }

    /**
     * @return mixed|null;
     * */
    protected function getItem($key)
    {
        if (!$this->itemExists($key)) {
            return null;
        }
        return $this->all()[$key];
    }

    /**
     * @param string $key ;
     * @param mixed $value ;
     * */
    protected function setItem($key, $value)
    {
        $values = $this->all();
        $values[$key] = $value;
        $this->setAll($values);
    }
    protected function setAll($values){
        $this->session->set($this->bucketId, $values);
        $this->session->save();
    }
}