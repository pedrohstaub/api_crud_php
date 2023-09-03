<?php

namespace App\Model;

class Notification extends Model{
    private $id;
    private $fk_order;
    private $fk_user;
    private $status;
    private $type;
    private $read;

    public function __construct($object){
        $this->id = !empty($object->id) ? $object->id : null;
        $this->fk_order = $object->fk_order;
        $this->fk_user = $object->fk_user;
        $this->status = $object->status;
        $this->type = $object->type;
        $this->read = $object->read;
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
     * Get the value of read
     */ 
    public function getRead()
    {
        return $this->read;
    }

    /**
     * Set the value of read
     *
     * @return  self
     */ 
    public function setRead($read)
    {
        $this->read = $read;

        return $this;
    }
}