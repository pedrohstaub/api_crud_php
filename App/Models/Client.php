<?php

namespace App\Models;

use App\Interfaces\ModelInterface;
// use App\Models\Connect;

include_once("Connect.php");

class Client implements ModelInterface
{
    public $table = "client";

    /**
     * get clients 
     *
     * @param  int $id
     * @return array
     */
    public function get(int $id = null)
    {
        $stmt = new Connect('client');
        $sql = "SELECT * from {$this->table} WHERE id = :id";
        $sql = $stmt->con->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("No client found!");
        }
    }

    /**
     * insert
     *
     * @param  object $object
     * @return boolean
     */
    public function insert($object)
    {
    }

    /**
     * update
     *
     * @param  object $object
     * @return boolean
     */
    public function update($object)
    {
    }

    /**
     * delete
     *
     * @param  int $id
     * @return boolean
     */
    public function delete($id)
    {
    }
}
