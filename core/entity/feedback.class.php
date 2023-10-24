<?php

class Feedback
{

    private $id;
    private $message;
    private $subject;
    private $account_id;


    public function __construct($id = null, $message = null, $subject = null, $account_id = null)
    {
        $this->id = $id;
        $this->message = $message;
        $this->subject = $subject;
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
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Get the value of subject
     */ 
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set the value of subject
     *
     * @return  self
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getAccountId()
    {
        return $this->account_id;
    }

    public function setAccountId($account_id): void
    {
        $this->account_id = $account_id;
    }
}