<?php

namespace App\Model;

class Billboard extends Model{
    private $id;
    private $fk_image;
    private $uri;
    private $fk_product;

    public function __construct($object){
        $this->id = !empty($object->id) ? $object->id : null;
        $this->fk_image = !empty($object->fk_image) ? $object->fk_image : null;
        $this->uri = !empty($object->uri) ? $object->uri : null;
    }

    /**
     * Get the value of uri
     */ 
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Set the value of uri
     *
     * @return  self
     */ 
    public function setUri($uri)
    {
        $this->uri = $uri;

        return $this;
    }

    /**
     * Get the value of fk_image
     */ 
    public function getFk_image()
    {
        return $this->fk_image;
    }

    /**
     * Set the value of fk_image
     *
     * @return  self
     */ 
    public function setFk_image($fk_image)
    {
        $this->fk_image = $fk_image;

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
}