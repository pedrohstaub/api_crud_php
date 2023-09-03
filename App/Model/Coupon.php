<?php

namespace App\Model;

class Coupon extends Model{
    private $id;
    private $code;
    private $datetime_expiration;
    private $type;
    private $amount;

    public function __construct($object){
        $this->id = !empty($object->id) ? $object->id : null;
        $this->code = $object->code;
        $this->datetime_expiration = $object->datetime_expiration;
        $this->type = $object->type;
        $this->amount = $object->amount;   
    }

    /**
     * Get the value of amount
     */ 
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *
     * @return  self
     */ 
    public function setAmount($amount)
    {
        $this->amount = $amount;

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
     * Get the value of datetime_expiration
     */ 
    public function getDatetime_expiration()
    {
        return $this->datetime_expiration;
    }

    /**
     * Set the value of datetime_expiration
     *
     * @return  self
     */ 
    public function setDatetime_expiration($datetime_expiration)
    {
        $this->datetime_expiration = $datetime_expiration;

        return $this;
    }

    /**
     * Get the value of code
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */ 
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
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
}