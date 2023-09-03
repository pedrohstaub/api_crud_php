<?php

namespace App\DAO;

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
                "mysql:host=".getenv('DB_HOST').";
                :port=".getenv('DB_PORT').";
                 dbname=".getenv('DB_NAME'),
                 getenv('DB_USER'),
                 getenv('DB_PASS')
            );
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
}
