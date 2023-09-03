<?php

namespace App\DAO;
use App\Model\ProductNnTag as productNnTagModel;

class ProductNnTag extends DAO{
    public $table = "product_nn_tag";

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
            foreach ($sql as $tag) {
                $result = new productNnTagModel($tag);
                array_push($return, $result);
            }
        } else {
            $return = false;
        }
        return $return;
    }
}