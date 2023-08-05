<?php 

class Doctor {

    private $id;
    private $name;
    private $email;
    private $contact;
    private $password;
    private $username;

    public function __construct($id=null, $name=null, $email=null, $contact=null, $password=null, $username=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->contact = $contact;
        $this->password = $password;
        $this->username = $username;
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

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }
}