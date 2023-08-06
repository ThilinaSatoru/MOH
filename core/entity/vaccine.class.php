<?php

class Vaccine {
    private $id;
    private $available;
    private $expire;
    private $factory;
    private $name;
    private $register;
    private $issued_by;

    public function __construct($id=null, $available=null, $expire=null, $factory=null, $name=null, $register=null, $register=null, $issued_by=null)
    {
        $this->id = $id;
        $this->available = $available;
        $this->expire = $expire;
        $this->factory = $factory;
        $this->name = $name;
        $this->register = $register;
        $this->register = $register;
        $this->issued_by = $issued_by;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of available
     */ 
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Set the value of available
     *
     * @return  self
     */ 
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get the value of expire
     */ 
    public function getExpire()
    {
        return $this->expire;
    }

    /**
     * Set the value of expire
     *
     * @return  self
     */ 
    public function setExpire($expire)
    {
        $this->expire = $expire;

        return $this;
    }

    /**
     * Get the value of factory
     */ 
    public function getFactory()
    {
        return $this->factory;
    }

    /**
     * Set the value of factory
     *
     * @return  self
     */ 
    public function setFactory($factory)
    {
        $this->factory = $factory;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of register
     */ 
    public function getRegister()
    {
        return $this->register;
    }

    /**
     * Set the value of register
     *
     * @return  self
     */ 
    public function setRegister($register)
    {
        $this->register = $register;

        return $this;
    }

    /**
     * Get the value of issued_by
     */ 
    public function getIssued_by()
    {
        return $this->issued_by;
    }

    /**
     * Set the value of issued_by
     *
     * @return  self
     */ 
    public function setIssued_by($issued_by)
    {
        $this->issued_by = $issued_by;

        return $this;
    }
}