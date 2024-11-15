<?php

namespace Geosoft\LavanderiaApp\controllers ;

use Geosoft\LavanderiaApp\modelos\Cliente;
use Geosoft\LavanderiaApp\repositorios\ClienteRepositorioInterface;
use PDO;

class ClienteController 
{
    private ClienteRepositorioInterface  $clienteRepositorio ;

    public function __construct(ClienteRepositorioInterface $clienteRepositorio)
    {
        $this->clienteRepositorio = $clienteRepositorio ;
    }

    public function showAdmin() {
        require_once __DIR__ . '/../views/admin-cliente.php' ;
    }

    public function showForm() {

             $cliente = new Cliente() ;
             require_once __DIR__ . '/../views/cliente_form.php' ;
     
        
        // $data = [
        //     'nome' => $_POST['nome'],
        //     'endereco' => $_POST['endereco'],
        //     'telefone' => $_POST['telefone'],
        //     'email' => $_POST['email']
        // ] ;
    }

    public function editarCliente(string $cpf) {
        $cliente = $this->clienteRepositorio->buscarCliente($cpf) ;
        require_once __DIR__ . "/../views/cliente_form.php" ;

    }
    public function inserirCliente() 
    {
        $nome = $_POST['nome'] ;
        header("Location: ./?success=" . $nome) ;
    }

    public function deletarCliente(string $cpf) 
    {
         $this->clienteRepositorio->deletarCliente($cpf) ;      
    }

    public function atualizarCliente(Cliente $cliente) {
       $this->clienteRepositorio->atualizarCliente($cliente) ;
       header('Location: ./') ;
    }

    public function adicionarCliente(Cliente $cliente) {
        $this->clienteRepositorio->adicionarCliente($cliente) ;
        header('Location: ./') ;
    }
}