<?php

require_once __DIR__ . '/../vendor/autoload.php' ;

use Geosoft\Lavanderia\config\Database;
use Geosoft\Lavanderia\Controllers\ClienteController;
use Geosoft\LavanderiaApp\Repositorio\ClienteRepositorio;



//Configurar a conexão com o banco de dados
$database = new Database() ;
$db = $database->getConnection() ;

//Instanciar o repositório

$clienteRepositorio = new ClienteRepositorio($db);


//Instanciar o controlodar com o repositorio via injeçao de dependencia
$controller = new ClienteController($clienteRepositorio) ;
$action = $_GET['action'] ?? 'showForm' ;

switch($action){
    case 'create' :
        $controller->criarCliente() ;
        break ;
    case 'showForm':
    default:
        $controller->showForm() ;
        break ;
}

?>
