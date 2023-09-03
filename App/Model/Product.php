<?php

namespace App\Model;

class Product extends Model{
    private $id;
    private $title;
    private $description;
    private $price;
    private $discount;
    private $status;
    private $units;
    private $external_uri;
    private $datetime_create;
    private $datetime_modify;
    private $fk_last_user_modify;

    public function __construct($object){
        $this->id = !empty($object->id) ? (int) $object->id : null;
        $this->title = $object->title;
        $this->description = !empty($object->description) ? $object->description : null;
        $this->price = $object->price;
        $this->discount = !empty($object->discount) ? $object->discount : null;
        $this->status = $object->status;
        $this->units = $object->units;
        $this->external_uri = $object->external_uri;
        $this->datetime_create = $object->datetime_create;
        $this->datetime_modify = !empty($object->datetime_modify) ? $object->datetime_modify : null;
        $this->fk_last_user_modify = !empty($object->fk_last_user_modify) ? $object->fk_last_user_modify : null;       
    }

    /**
     * Get the value of fk_last_user_modify
     */ 
    public function getFk_last_user_modify()
    {
        return $this->fk_last_user_modify;
    }

    /**
     * Set the value of fk_last_user_modify
     *
     * @return  self
     */ 
    public function setFk_last_user_modify($fk_last_user_modify)
    {
        $this->fk_last_user_modify = $fk_last_user_modify;

        return $this;
    }

    /**
     * Get the value of datetime_modify
     */ 
    public function getDatetime_modify()
    {
        return $this->datetime_modify;
    }

    /**
     * Set the value of datetime_modify
     *
     * @return  self
     */ 
    public function setDatetime_modify($datetime_modify)
    {
        $this->datetime_modify = $datetime_modify;

        return $this;
    }

    /**
     * Get the value of datetime_create
     */ 
    public function getDatetime_create()
    {
        return $this->datetime_create;
    }

    /**
     * Set the value of datetime_create
     *
     * @return  self
     */ 
    public function setDatetime_create($datetime_create)
    {
        $this->datetime_create = $datetime_create;

        return $this;
    }

    /**
     * Get the value of external_uri
     */ 
    public function getExternal_uri()
    {
        return $this->external_uri;
    }

    /**
     * Set the value of external_uri
     *
     * @return  self
     */ 
    public function setExternal_uri($external_uri)
    {
        $this->external_uri = $external_uri;

        return $this;
    }

    /**
     * Get the value of units
     */ 
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * Set the value of units
     *
     * @return  self
     */ 
    public function setUnits($units)
    {
        $this->units = $units;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of discount
     */ 
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set the value of discount
     *
     * @return  self
     */ 
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

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