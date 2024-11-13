<?php

namespace Geosoft\LavanderiaApp\controllers ;

use Geosoft\LavanderiaApp\repositorios\ClienteRepositorioInterface;

class ClienteController {
    private $repositorio ;

    public function __construct(ClienteRepositorioInterface $repositorio)
    {
        $this->repositorio = $repositorio ;
    }

    public function showForm() {
        include __DIR__ . '/../views/admin-cliente.php' ;
    }

    public function criarCliente() {

        include __DIR__ . '/../views/cliente_form.php' ;
        // $data = [
        //     'nome' => $_POST['nome'],
        //     'endereco' => $_POST['endereco'],
        //     'telefone' => $_POST['telefone'],
        //     'email' => $_POST['email']
        // ] ;
    }

    public function inserirCliente() 
    {
        $nome = $_POST['nome'] ;
        header("Location: ./?success=" . $nome) ;
    }
}