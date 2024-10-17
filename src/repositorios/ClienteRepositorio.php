<?php

namespace Geosoft\LavanderiaApp\Repositorio ;

use Geosoft\LavanderiaApp\Modelo\Cliente;
use PDO;

class ClienteRepositorio implements ClienteRepositorioInterface 
{
    private PDO $conn ;
    private $tableName = "clientes" ;

    public function __construct(PDO $db)
    {
        $this->conn = $db ;
    }
    public function adicionarCliente(Cliente $cliente): bool
    {
        $sql = "INSERT INTO" . $this->tableName . "(nome,endereco,telefone,email) values (:nome,:endereco,:telefone,:email) " ;
        $stmt = $this->conn->prepare($sql) ;
        $stmt->bindValue(":nome",$cliente->nome) ;
        $stmt->bindValue(param:":endereco",value:$cliente->endereco) ;
        $stmt->bindValue(param:":telefone",value: $cliente->telefone) ;
        $stmt->bindValue(param:":email", value: $cliente->email) ;

        if ($stmt->execute()){
            return true ;
        }

        return false ;
    }
}