<?php

namespace App\DAO;

use App\Model\File as fileModel;

class File extends DAO
{
    public $table = "files";

    public function getByUuid($uuid)
    {
        $stmt = new Connect($this->table);
        $sql = "SELECT * FROM $this->table where external_uri = :uuid";
        $sql = $stmt->con->prepare($sql);
        $sql->bindValue(":uuid", $uuid);
        $sql->execute();
        $sql = $sql->fetch(\PDO::FETCH_OBJ);
        if ($sql) {
            $result = new fileModel($sql);
        } else {
            $result = false;
        }
        return $result;
    }

    public function getByProduct($id)
    {
        $return = array();
        $stmt = new Connect($this->table);
        $sql = "SELECT * FROM $this->table where fk_product = :id";
        $sql = $stmt->con->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
        $sql = $sql->fetchAll(\PDO::FETCH_OBJ);
        if ($sql) {
            foreach ($sql as $file) {
                $result = new fileModel($file);
                array_push($return, $result);
            }
        } else {
            $return = false;
        }
        return $return;
    }
}
