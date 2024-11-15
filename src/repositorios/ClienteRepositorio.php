<?php

namespace Geosoft\LavanderiaApp\repositorios ;

use Geosoft\LavanderiaApp\modelos\Cliente;

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
        $sql = "INSERT INTO " . $this->tableName . "(cpf,nome,endereco,telefone,email) values (:cpf, :nome,:endereco,:telefone,:email) " ;
        $stmt = $this->conn->prepare($sql) ;
        $stmt->bindValue(":cpf",$cliente->cpf) ;
        $stmt->bindValue(":nome",$cliente->nome) ;
        $stmt->bindValue(param:":endereco",value:$cliente->endereco) ;
        $stmt->bindValue(param:":telefone",value: $cliente->telefone) ;
        $stmt->bindValue(param:":email", value: $cliente->email) ;

        if ($stmt->execute()){
            return true ;
        }

        return false ;
    }

    public function All(): array
    {
        $sql = "SELECT * from " . $this->tableName  ;
        $stmt = $this->conn->query($sql) ;
        $clienteDados = $stmt->fetchAll(mode:PDO::FETCH_ASSOC) ;
        $clientes = array_map(function($clienteData){
            return new Cliente($clienteData['cpf'],$clienteData['nome'],$clienteData['endereco'],
            $clienteData['telefone'],$clienteData['email'],$clienteData['created_at']) ;
        },$clienteDados) ;
        return $clientes ;

    }

    function buscarCliente(string $cpf) : Cliente
    {
        $sql = 'SELECT * from ' . $this->tableName . ' WHERE cpf = ?' ;
        $stmt = $this->conn->prepare($sql) ;
        $stmt ->bindValue(param:1,value:$cpf) ;
        $stmt->execute() ;
        $dados = $stmt->fetch(mode:PDO::FETCH_ASSOC) ;
       $cliente = new Cliente($dados['cpf'],
                            $dados['nome'],
                            $dados['endereco'],
                            $dados['telefone'],
                            $dados['email'],
                            $dados['created_at']) ;
        return $cliente ;

    }

    public function deletarCliente(string $cpf)
    {
        $sql = "DELETE FROM " . $this->tableName . " WHERE cpf = ?"  ;
        $stmt = $this->conn->prepare($sql) ;
        $stmt->bindValue(param:1,value:$cpf) ;
        $stmt->execute() ;
    }

    public function atualizarCliente(Cliente $cliente)
    {
        $sql = 'UPDATE clientes set cpf = ? , nome = ? , endereco = ? , telefone = ? , email = ? where cpf=?' ;
        $stmt = $this->conn->prepare($sql) ;
        $stmt->bindValue(param:1,value:$cliente->cpf) ;
        $stmt->bindValue(param:2, value:$cliente->nome) ;
        $stmt->bindValue(param:3,value:$cliente->endereco) ;
        $stmt->bindValue(param:4,value:$cliente->telefone) ;
        $stmt->bindValue(param:5,value: $cliente->email) ;
        $stmt->bindValue(param:6, value: $cliente->cpf) ;
        $stmt->execute() ;


    }
}