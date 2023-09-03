<?php
namespace App\DAO;
ini_set("display_errors", 1);

use App\DAO\Connect as Connect;

class DAO
{
    public $table;
    
    /**
     * select specific ID. If id = null, select all rows.
     *
     * @param  int $id
     * @return object
     */
    public function select(int $id = null){
        $stmt = new Connect($this->table);
        $sql = "SELECT * FROM $this->table";
        if($id){
            $sql .= " WHERE id = {$id}";
        }
        $sql = $stmt->con->prepare($sql);
        $sql->execute();
        $result = $sql->fetchAll(\PDO::FETCH_ASSOC);
        return $result ? (object) $result : false;
    }

    public function insert($object){
        $stmt = new Connect($this->table);
        if(!$object){
            return false;
        }

        $params = $object->getProperties();
        if(!$params){
            return false;
        }

        $sql = "INSERT INTO $this->table (";
        
        foreach($params as $key => $param){
            if($param != 'id'){
                $sql .= "$param";
                if(intval($key) < (count($params) - 1)){
                    $sql .= ", ";
                }
            }
        }

        $sql .= ") VALUES(";

        foreach($params as $key => $param){
            if($param != 'id'){
                $sql .= ":$param";
                if(intval($key) < (count($params) - 1)){
                    $sql .= ", ";
                }
            }
        }

        $sql .= ")";
        $sql = $stmt->con->prepare($sql);

        foreach($params as $param){
            if($param != 'id'){
                $get = "get" . ucfirst($param);
                $sql->bindValue(":$param", $object->$get());
            }
        }

        return $sql->execute();
    }   

    public function update(object $object){
        $stmt = new Connect($this->table);
        if(!$object){
            return false;
        }
        
        $params = $object->getProperties();
        
        if(!$params){
            return false;
        }
        
        $sql = "UPDATE $this->table SET ";

        foreach($params as $key => $param){
            if($param != 'id'){
                $sql .= "$param = :$param";
                if(intval($key) < (count($params) - 1)){
                    $sql .= ", ";
                }
            }
        }

        $sql .= " WHERE id = :id";

        $sql = $stmt->con->prepare($sql);

        foreach($params as $param){
            $get = "get" . ucfirst($param);
            $sql->bindValue(":$param", $object->$get());
            
        }

        return $sql->execute();
    }

    public function delete(int $id){
        $stmt = new Connect($this->table);
        if(!$id){
            return false;
        }

        $sql = "DELETE FROM $this->table WHERE id = :id";
        $sql = $stmt->con->prepare($sql);
        $sql->bindValue(":id", $id);
        return $sql->execute();
    }
}