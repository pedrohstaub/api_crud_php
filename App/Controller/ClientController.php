<?php

namespace App\Controller;
use App\Models\Client as ClientModel;
use App\Entity\Client as ClientEntity;

class ClientController{    
    /**
     * get 
     * get all or specific value from client
     * @param  mixed $params
     * @return string
     */
    public function get($params){
            
        $clientModel = new ClientModel();

        $return =  $clientModel->get($params->id);

        var_dump($return);
    }

        
    /**
     * post
     * insert new row in clients
     * @return string
     */
    public function post(){
        echo 'ihu';
    }
    public function update(){

    }
    public function delete(){

    }
}