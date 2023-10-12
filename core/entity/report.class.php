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
        $id = null,
        $bcg1 = null,
        $bcg2 = null,
        $hep1 = null,
        $hep2 = null,
        $polio1 = null,
        $polio2 = null,
        $sarampa1 = null,
        $sarampa2 = null,
        $se1 = null,
        $se2 = null,
        $baby_id = null,
        $approved_by = null,
        $issued_by = null)
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


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getBcg1()
    {
        return $this->bcg1;
    }

    public function setBcg1($bcg1)
    {
        $this->bcg1 = $bcg1;
        return $this;
    }

    public function getBcg2()
    {
        return $this->bcg2;
    }

    public function setBcg2($bcg2)
    {
        $this->bcg2 = $bcg2;
        return $this;
    }

    public function getHep1()
    {
        return $this->hep1;
    }

    public function setHep1($hep1)
    {
        $this->hep1 = $hep1;
        return $this;
    }

    public function getHep2()
    {
        return $this->hep2;
    }

    public function setHep2($hep2)
    {
        $this->hep2 = $hep2;
        return $this;
    }

    public function getPolio1()
    {
        return $this->polio1;
    }

    public function setPolio1($polio1)
    {
        $this->polio1 = $polio1;
        return $this;
    }

    public function getPolio2()
    {
        return $this->polio2;
    }

    public function setPolio2($polio2)
    {
        $this->polio2 = $polio2;
        return $this;
    }

    public function getSarampa1()
    {
        return $this->sarampa1;
    }

    public function setSarampa1($sarampa1)
    {
        $this->sarampa1 = $sarampa1;
        return $this;
    }

    public function getSarampa2()
    {
        return $this->sarampa2;
    }

    public function setSarampa2($sarampa2)
    {
        $this->sarampa2 = $sarampa2;
        return $this;
    }

    public function getSe1()
    {
        return $this->se1;
    }

    public function setSe1($se1)
    {
        $this->se1 = $se1;
        return $this;
    }

    public function getSe2()
    {
        return $this->se2;
    }

    public function setSe2($se2)
    {
        $this->se2 = $se2;
        return $this;
    }

    public function getBaby_id()
    {
        return $this->baby_id;
    }

    public function setBaby_id($baby_id)
    {
        $this->baby_id = $baby_id;
        return $this;
    }

    public function getApproved_by()
    {
        return $this->approved_by;
    }

    public function setApproved_by($approved_by)
    {
        $this->approved_by = $approved_by;
        return $this;
    }

    public function getIssued_by()
    {
        return $this->issued_by;
    }

    public function setIssued_by($issued_by)
    {
        $this->issued_by = $issued_by;
        return $this;
    }
}