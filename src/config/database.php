<?php

namespace Geosoft\Lavanderia\config ;

use PDO;
use PDOException;

class Database
{
    private $host = "localhost" ;
    private $db_name = "lavanderia-app" ;
    private $username = "root" ;
    private $password = "" ;

    public $conn ;

    public function getConnection(): PDO {
        $this->conn = null ;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, username: $this->username, password: $this->password ) ;

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
        } catch(PDOException $exception) {
            echo "Erro na conexão: " . $exception->getMessage() ;
        }

        return $this->conn ;
    }

}