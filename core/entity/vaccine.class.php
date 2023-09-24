<?php

class Vaccine
{

    private $id;
    private $available;
    private $expire;
    private $factory;
    private $name;
    private $register;
    private $issued_by;

    /**
     * @param $id
     * @param $available
     * @param $expire
     * @param $factory
     * @param $name
     * @param $register
     * @param $issued_by
     */
    public function __construct($id = null, $available = null, $expire = null, $factory = null, $name = null, $register = null, $issued_by = null)
    {
        $this->id = $id;
        $this->available = $available;
        $this->expire = $expire;
        $this->factory = $factory;
        $this->name = $name;
        $this->register = $register;
        $this->issued_by = $issued_by;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * @param mixed $available
     */
    public function setAvailable($available): void
    {
        $this->available = $available;
    }

    /**
     * @return mixed
     */
    public function getExpire()
    {
        return $this->expire;
    }

    /**
     * @param mixed $expire
     */
    public function setExpire($expire): void
    {
        $this->expire = $expire;
    }

    /**
     * @return mixed
     */
    public function getFactory()
    {
        return $this->factory;
    }

    /**
     * @param mixed $factory
     */
    public function setFactory($factory): void
    {
        $this->factory = $factory;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getRegister()
    {
        return $this->register;
    }

    /**
     * @param mixed $register
     */
    public function setRegister($register): void
    {
        $this->register = $register;
    }

    /**
     * @return mixed
     */
    public function getIssuedBy()
    {
        return $this->issued_by;
    }

    /**
     * @param mixed $issued_by
     */
    public function setIssuedBy($issued_by): void
    {
        $this->issued_by = $issued_by;
    }

}