<?php

namespace App\routes;

class routerModel
{
    private $uri;
    private $method;
    private $controller;
    private $action;
    private $tokenAutentication;

    function __construct(string $uri, string $method, string $controller, string $action, bool $tokenAutentication = false)
    {
        $this->uri = $uri;
        $this->method = $method;
        $this->controller = $controller;
        $this->action = $action;
        $this->tokenAutentication = $tokenAutentication;
    }

    /**
     * Get the value of uri
     */ 
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Get the value of method
     */ 
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Get the value of controller
     */ 
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Get the value of action
     */ 
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Get the value of tokenAutentication
     */ 
    public function getTokenAutentication()
    {
        return $this->tokenAutentication;
    }
}
