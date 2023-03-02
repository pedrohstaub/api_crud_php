<?php

namespace App\Models;

use Exception;
use \PDO;
use PDOException;
use stdClass;

class Connect
{
    /**
     * Connection
     *
     * @var PDO
     */
    public $con;
    public $table;
    
    public function __construct($table = null)
    {
       $this->table = $table;
       $this->setConnection();
    }

    private function setConnection(){
        // var_dump($this->db_user);

        try {
            $this->con = new PDO(
                "mysql:host=".DBHOST.";
                :port=".DBPORT.";
                 dbname=".DBNAME,
                DBUSER,
                DBPASS
            );
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
}
