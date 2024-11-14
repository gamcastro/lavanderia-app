<?php

use Geosoft\LavanderiaApp\config\Database;
use Geosoft\LavanderiaApp\controllers\ClienteController;
use Geosoft\LavanderiaApp\repositorios\ClienteRepositorio;

require_once __DIR__ . '/vendor/autoload.php' ;

define('APP_NAME', '/lavanderia-app');
$route = str_replace(APP_NAME, '', $_SERVER['REQUEST_URI']);
if (empty($route)) {
    $route = '/' ;
}
$database = new Database() ;

$clienteRepositorio = new ClienteRepositorio($database->getConnection()) ;

if ($route === '/') {
    $controller = new ClienteController($clienteRepositorio) ;
    $controller->showForm() ;   
} elseif ($route === '/novo-cliente') {
    $controller = new ClienteController($clienteRepositorio) ;
    $controller->criarCliente() ;
   
} elseif ($route === '/inserir-cliente') {
    $controller = new ClienteController($clienteRepositorio) ;
    $controller->inserirCliente() ;
}
// require_once __DIR__ . '/../vendor/autoload.php' ;



// use Geosoft\LavanderiaApp\config\Database;


// use Geosoft\LavanderiaApp\controllers\ClienteController;
// use Geosoft\LavanderiaApp\repositorios\ClienteRepositorio;


// //Configurar a conexão com o banco de dados
// $database = new Database() ;
// $db = $database->getConnection() ;

// //Instanciar o repositório

// $clienteRepositorio = new ClienteRepositorio($db);


// //Instanciar o controlodar com o repositorio via injeçao de dependencia
// $controller = new ClienteController($clienteRepositorio) ;
// $action = $_GET['action'] ?? 'showForm' ;

// switch($action){
//     case 'create' :
//         $controller->criarCliente() ;
//         break ;
//     case 'showForm':
//     default:
//         $controller->showForm() ;
//         break ;
// }

?>
