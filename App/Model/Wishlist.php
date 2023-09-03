<?php

namespace App\Model;

class ProductNnTag extends Model{
    private $fk_user;
    private $fk_product;

    public function __construct($object){
        $this->fk_user = !empty($object->fk_user) ? $object->fk_user : null;
        $this->fk_product = !empty($object->fk_product) ? $object->fk_product : null;
    }
}