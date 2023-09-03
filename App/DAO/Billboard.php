<?php

namespace App\DAO;

use App\Model\Billboard as billboardModel;

class Billboard extends DAO
{
    public $table = "billboard";

    public function getIndex()
    {
        $return = array();
        $stmt = new Connect($this->table);
        $sql = "SELECT
                    b.*,
                    p.title as title,
                    p.description as description,
                    p.price as price,
                    (SELECT file FROM files f WHERE f.fk_product = p.id ORDER BY id LIMIT 1) as image	
                FROM
                    $this->table b
                INNER JOIN products p on
                    p.id = b.fk_product
        ";
        $sql = $stmt->con->prepare($sql);
        $sql->execute();
        $sql = $sql->fetchAll(\PDO::FETCH_OBJ);
        if ($sql) {
            foreach ($sql as $result) {
                array_push($return, $result);
            }
        } else {
            $return = false;
        }
        return $return;
    }
}
