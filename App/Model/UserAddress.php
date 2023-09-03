<?php

namespace App\Model;

class Coupon extends Model{
    private $id;
    private $description;
    private $street;
    private $number;
    private $district;
    private $zipcode;
    private $complement;
    private $fk_user;

    public function __construct($object){
        $this->id = !empty($object->id) ? $object->id : null;
        $this->street = $object->street;
        $this->number = $object->number;
        $this->district = $object->district;
        $this->zipcode = $object->zipcode;
        $this->complement = !empty($object->complement) ? $object->complement : null;
        $this->fk_user = $object->fk_user;
    }

    /**
     * Get the value of fk_user
     */ 
    public function getFk_user()
    {
        return $this->fk_user;
    }

    /**
     * Set the value of fk_user
     *
     * @return  self
     */ 
    public function setFk_user($fk_user)
    {
        $this->fk_user = $fk_user;

        return $this;
    }

    /**
     * Get the value of complement
     */ 
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * Set the value of complement
     *
     * @return  self
     */ 
    public function setComplement($complement)
    {
        $this->complement = $complement;

        return $this;
    }

    /**
     * Get the value of zipcode
     */ 
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set the value of zipcode
     *
     * @return  self
     */ 
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get the value of district
     */ 
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Set the value of district
     *
     * @return  self
     */ 
    public function setDistrict($district)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Get the value of number
     */ 
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set the value of number
     *
     * @return  self
     */ 
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get the value of street
     */ 
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set the value of street
     *
     * @return  self
     */ 
    public function setStreet($street)
    {
        $this->street = $street;

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