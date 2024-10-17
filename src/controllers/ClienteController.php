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
        include __DIR__ . '/../views/cliente_form.php' ;
    }

    public function criarCliente() {
        $data = [
            'nome' => $_POST['nome'],
            'endereco' => $_POST['endereco'],
            'telefone' => $_POST['telefone'],
            'email' => $_POST['email']
        ] ;
    }
}