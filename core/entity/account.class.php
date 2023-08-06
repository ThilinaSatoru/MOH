<?php

class Account {
    private $id;
    private $nic;
    private $username;
    private $password;
    private $type;

    public function __construct($id=null, $nic=null, $username=null, $password=null, $type=null)
    {
        $this->id = $id;
        $this->nic = $nic;
        $this->username = $username;
        $this->password = $password;
        $this->type = $type;
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
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of nic
     */ 
    public function getNic()
    {
        return $this->nic;
    }

    /**
     * Set the value of nic
     *
     * @return  self
     */ 
    public function setNic($nic)
    {
        $this->nic = $nic;

        return $this;
    }
}