<?php

namespace App\DAO;
use App\Model\User as userModel;

class User extends DAO
{
    public $table = "users";

    public function get_by_email(String $email)
    {
        $stmt = new Connect($this->table);
        $sql = "SELECT * FROM $this->table where email = :email";
        $sql = $stmt->con->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();
        $sql = $sql->fetch(\PDO::FETCH_OBJ);
        if($sql){
            $result = new userModel($sql);
        }else{
            $result = false;
        }
        return $result;
    }
}
