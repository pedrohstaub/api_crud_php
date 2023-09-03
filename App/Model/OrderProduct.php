<?php

namespace App\Model;

class OrderProduct extends Model{
    private $id;
    private $fk_order;
    private $fk_product;
    private $value;
    private $amount;

    public function __construct($object){
        $this->id = !empty($object->id) ? $object->id : null;
        $this->fk_order = $object->fk_order;
        $this->fk_product = $object->fk_product;
        $this->value = $object->value;
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
     * Get the value of value
     */ 
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of value
     *
     * @return  self
     */ 
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get the value of fk_product
     */ 
    public function getFk_product()
    {
        return $this->fk_product;
    }

    /**
     * Set the value of fk_product
     *
     * @return  self
     */ 
    public function setFk_product($fk_product)
    {
        $this->fk_product = $fk_product;

        return $this;
    }

    /**
     * Get the value of fk_order
     */ 
    public function getFk_order()
    {
        return $this->fk_order;
    }

    /**
     * Set the value of fk_order
     *
     * @return  self
     */ 
    public function setFk_order($fk_order)
    {
        $this->fk_order = $fk_order;

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