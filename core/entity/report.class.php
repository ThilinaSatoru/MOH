<?php

class Report {

    private $id;
    private $bcg1;
    private $bcg2;
    private $hep1;
    private $hep2;
    private $polio1;
    private $polio2;
    private $sarampa1;
    private $sarampa2;
    private $se1;
    private $se2;
    private $baby_id;
    private $approved_by;
    private $issued_by;

    public function __construct(
        $id=null,
         $bcg1=null,
          $bcg2=null,
           $hep1=null,
            $hep2=null,
             $polio1=null,
              $polio2=null,
               $sarampa1=null,
                $sarampa2=null,
                 $se1=null,
                  $se2=null,
                    $baby_id=null,
                     $approved_by=null,
                      $issued_by=null)
    {
        $this->id = $id;
        $this->bcg1 = $bcg1;
        $this->bcg2 = $bcg2;
        $this->hep1 = $hep1;
        $this->hep2 = $hep2;
        $this->polio1 = $polio1;
        $this->polio2 = $polio2;
        $this->sarampa1 = $sarampa1;
        $this->sarampa2 = $sarampa2;
        $this->se1 = $se1;
        $this->se2 = $se2;
        $this->baby_id = $baby_id;
        $this->approved_by = $approved_by;
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
     * Get the value of bcg1
     */ 
    public function getBcg1()
    {
        return $this->bcg1;
    }

    /**
     * Set the value of bcg1
     *
     * @return  self
     */ 
    public function setBcg1($bcg1)
    {
        $this->bcg1 = $bcg1;

        return $this;
    }

    /**
     * Get the value of bcg2
     */ 
    public function getBcg2()
    {
        return $this->bcg2;
    }

    /**
     * Set the value of bcg2
     *
     * @return  self
     */ 
    public function setBcg2($bcg2)
    {
        $this->bcg2 = $bcg2;

        return $this;
    }

    /**
     * Get the value of hep1
     */ 
    public function getHep1()
    {
        return $this->hep1;
    }

    /**
     * Set the value of hep1
     *
     * @return  self
     */ 
    public function setHep1($hep1)
    {
        $this->hep1 = $hep1;

        return $this;
    }

    /**
     * Get the value of hep2
     */ 
    public function getHep2()
    {
        return $this->hep2;
    }

    /**
     * Set the value of hep2
     *
     * @return  self
     */ 
    public function setHep2($hep2)
    {
        $this->hep2 = $hep2;

        return $this;
    }

    /**
     * Get the value of polio1
     */ 
    public function getPolio1()
    {
        return $this->polio1;
    }

    /**
     * Set the value of polio1
     *
     * @return  self
     */ 
    public function setPolio1($polio1)
    {
        $this->polio1 = $polio1;

        return $this;
    }

    /**
     * Get the value of polio2
     */ 
    public function getPolio2()
    {
        return $this->polio2;
    }

    /**
     * Set the value of polio2
     *
     * @return  self
     */ 
    public function setPolio2($polio2)
    {
        $this->polio2 = $polio2;

        return $this;
    }

    /**
     * Get the value of sarampa1
     */ 
    public function getSarampa1()
    {
        return $this->sarampa1;
    }

    /**
     * Set the value of sarampa1
     *
     * @return  self
     */ 
    public function setSarampa1($sarampa1)
    {
        $this->sarampa1 = $sarampa1;

        return $this;
    }

    /**
     * Get the value of sarampa2
     */ 
    public function getSarampa2()
    {
        return $this->sarampa2;
    }

    /**
     * Set the value of sarampa2
     *
     * @return  self
     */ 
    public function setSarampa2($sarampa2)
    {
        $this->sarampa2 = $sarampa2;

        return $this;
    }

    /**
     * Get the value of se1
     */ 
    public function getSe1()
    {
        return $this->se1;
    }

    /**
     * Set the value of se1
     *
     * @return  self
     */ 
    public function setSe1($se1)
    {
        $this->se1 = $se1;

        return $this;
    }

    /**
     * Get the value of se2
     */ 
    public function getSe2()
    {
        return $this->se2;
    }

    /**
     * Set the value of se2
     *
     * @return  self
     */ 
    public function setSe2($se2)
    {
        $this->se2 = $se2;

        return $this;
    }

    /**
     * Get the value of baby_id
     */ 
    public function getBaby_id()
    {
        return $this->baby_id;
    }

    /**
     * Set the value of baby_id
     *
     * @return  self
     */ 
    public function setBaby_id($baby_id)
    {
        $this->baby_id = $baby_id;

        return $this;
    }

    /**
     * Get the value of approved_by
     */ 
    public function getApproved_by()
    {
        return $this->approved_by;
    }

    /**
     * Set the value of approved_by
     *
     * @return  self
     */ 
    public function setApproved_by($approved_by)
    {
        $this->approved_by = $approved_by;

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