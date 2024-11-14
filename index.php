<?php

use Geosoft\LavanderiaApp\config\Database;
use Geosoft\LavanderiaApp\controllers\ClienteController;
use Geosoft\LavanderiaApp\repositorios\ClienteRepositorio;

require_once __DIR__ . '/vendor/autoload.php' ;

define('APP_NAME', '/lavanderia-app');
$urlSemParams = explode('?',$_SERVER['REQUEST_URI'])[0] ;
//var_dump($urlSemParams) ;
//exit() ;
$route = str_replace(APP_NAME, '', $urlSemParams); 
//var_dump($route) ;
//exit() ;
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
} elseif ($route === '/excluir-cliente'){
    echo "Excluir" ;
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
