<?php

//Alterado o nome do arquivo
namespace Geosoft\LavanderiaApp\config ;

use PDO;
use PDOException;

class Database
{
    private $host = "localhost" ;
    private $db_name = "u614876628_db" ;
    private $username = "u614876628_george" ;
    private $password = "Geor1ge2" ;

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