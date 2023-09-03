<?php

namespace App\Model;

use App\Model\Model;

class User extends Model{    

    private $id;
    private $name;    
    private $email;
    private $password;
    private $cpf;
    private $phone;
    private $fk_photo;
    private $fk_profile;
    private $token;
    private $last_login;

    public function __construct($object)
    {
        $this->id = !empty($object->id) ? $object->id : null;
        $this->name = $object->name;
        $this->email = $object->email;
        $this->password = $object->password;
        $this->cpf = $object->cpf;
        $this->phone = $object->phone;
        $this->fk_photo = !empty($object->fk_photo) ? $object->fk_photo : null;
        $this->fk_profile = $object->fk_profile;
        $this->token = $object->token;
        $this->last_login = !empty($object->last_login) ? $object->last_login : null;
    }

    /**
     * Get the value of last_login
     */ 
    public function getLast_login()
    {
        return $this->last_login;
    }

    /**
     * Set the value of last_login
     *
     * @return  self
     */ 
    public function setLast_login($last_login)
    {
        $this->last_login = $last_login;

        return $this;
    }

    /**
     * Get the value of token
     */ 
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set the value of token
     *
     * @return  self
     */ 
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get the value of fk_profile
     */ 
    public function getFk_profile()
    {
        return $this->fk_profile;
    }

    /**
     * Set the value of fk_profile
     *
     * @return  self
     */ 
    public function setFk_profile($fk_profile)
    {
        $this->fk_profile = $fk_profile;

        return $this;
    }

    /**
     * Get the value of fk_photo
     */ 
    public function getFk_photo()
    {
        return $this->fk_photo;
    }

    /**
     * Set the value of fk_photo
     *
     * @return  self
     */ 
    public function setFk_photo($fk_photo)
    {
        $this->fk_photo = $fk_photo;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of cpf
     */ 
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     *
     * @return  self
     */ 
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get id
     *
     * @return  int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id
     *
     * @param  int  $id  id
     *
     * @return  self
     */ 
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}