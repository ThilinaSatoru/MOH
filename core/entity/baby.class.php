<?php

class Baby {
    private $id;
    private $name;
    private $gender;
    private $dob;
    private $weight;
    private $reg_date;
    private $family_id;

    public function __construct($id=null, $name=null, $gender=null, $dob=null, $weight=null, $reg_date=null, $family_id=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->gender = $gender;
        $this->dob = $dob;
        $this->weight = $weight;
        $this->reg_date = $reg_date;
        $this->$family_id = $family_id;
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
    }

    /**
     * Get the value of gender
     */ 
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */ 
    public function setGender($gender)
    {
        $this->gender = $gender;
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
     * Get the value of weight
     */ 
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set the value of weight
     *
     * @return  self
     */ 
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * Get the value of reg_date
     */ 
    public function getReg_date()
    {
        return $this->reg_date;
    }

    /**
     * Set the value of reg_date
     *
     * @return  self
     */ 
    public function setReg_date($reg_date)
    {
        $this->reg_date = $reg_date;
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
}