<?php

namespace App\Model;

class ProductNnTag extends Model{
    private $fk_product;
    private $fk_tag;

    public function __construct($object){
        $this->fk_product = !empty($object->fk_product) ? $object->fk_product : null;
        $this->fk_tag = !empty($object->fk_tag) ? $object->fk_tag : null;
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
     * Get the value of fk_tag
     */ 
    public function getFk_tag()
    {
        return $this->fk_tag;
    }

    /**
     * Set the value of fk_tag
     *
     * @return  self
     */ 
    public function setFk_tag($fk_tag)
    {
        $this->fk_tag = $fk_tag;

        return $this;
    }
}