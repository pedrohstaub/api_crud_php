<?php

namespace App\Model;

class File extends Model{
    private $id;
    private $description;
    private $file;
    private $external_uri;

    public function __construct($object){
        $this->id = !empty($object->id) ? $object->id : null;
        $this->description = $object->description;
        $this->file = $object->file;
        $this->external_uri = $object->external_uri;
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
     * Get the value of file
     */ 
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set the value of file
     *
     * @return  self
     */ 
    public function setFile($file)
    {
        $this->file = $file;

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