<?php

class Nurse {
    private $id;
    private $name;
    private $email;
    private $contact;
    private $account_id;

    public function __construct($id=null, $name=null, $email=null, $contact=null, $account_id=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->contact = $contact;
        $this->account_id = $account_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }
 
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getContact()
    {
        return $this->contact;
    }

    function setContact($contact)
    {
        $this->contact = $contact;
    }

    public function getAccount_id()
    {
        return $this->account_id;
    }

    public function setAccount_id($account_id)
    {
        $this->account_id = $account_id;
    }
}