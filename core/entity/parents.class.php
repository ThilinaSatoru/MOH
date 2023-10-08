<?php


class Parents
{

    private $id;
    private $name;
    private $email;
    private $contact;
    private $nic;
    private $dob;
    private $address;
    private $family_id;
    private $type;

    public function __construct($id = null, $name = null, $email = null, $contact = null, $nic = null, $dob = null, $address = null, $family_id = null, $type = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->contact = $contact;
        $this->nic = $nic;
        $this->dob = $dob;
        $this->address = $address;
        $this->family_id = $family_id;
        $this->type = $type;
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

    public function setContact($contact)
    {
        $this->contact = $contact;
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
    }

    /**
     * Get the value of dob
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * Get the value of family_id
     */
    public function getFamily_id()
    {
        return $this->family_id;
    }

    /**
     * Set the value of family_id
     *
     * @return  self
     */
    public function setFamily_id($family_id)
    {
        $this->family_id = $family_id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
}
