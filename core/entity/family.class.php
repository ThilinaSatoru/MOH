<?php

class Family {
    private $id;
    private $date_married;
    private $account_id;



    public function __construct($id=null, $date_married=null, $account_id=null)
    {
        $this->id = $id;
        $this->date_married = $date_married;
        $this->account_id = $account_id;
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
    }

    /**
     * Get the value of date_married
     */ 
    public function getDate_married()
    {
        return $this->date_married;
    }

    /**
     * Set the value of date_married
     *
     * @return  self
     */ 
    public function setDate_married($date_married)
    {
        $this->date_married = $date_married;
    }

    /**
     * Get the value of account_id
     */ 
    public function getAccount_id()
    {
        return $this->account_id;
    }

    /**
     * Set the value of account_id
     *
     * @return  self
     */ 
    public function setAccount_id($account_id)
    {
        $this->account_id = $account_id;
    }
}

