<?php

use Geosoft\LavanderiaApp\config\Database;
use Geosoft\LavanderiaApp\controllers\ClienteController;
use Geosoft\LavanderiaApp\Modelos\Cliente;
use Geosoft\LavanderiaApp\repositorios\ClienteRepositorio;

require_once __DIR__ . '/vendor/autoload.php' ;

define('APP_NAME', '/lavanderia-app');
// var_dump($_SERVER['REQUEST_URI']);
// exit() ;

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
    $controller->showAdmin() ;   
} elseif ($route === '/novo-cliente') { 
    if ($_SERVER['REQUEST_METHOD'] === 'GET')  {
        $controller = new ClienteController($clienteRepositorio) ;
        $controller->showForm() ;
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cliente = new Cliente($_POST['cpf'],$_POST['nome'],$_POST['endereco'],$_POST['telefone'],$_POST['email']) ;
        $controller = new ClienteController($clienteRepositorio) ;
        $controller->adicionarCliente($cliente) ;
        header('Location: ./') ;
    }
   
   
} elseif ($route === '/editar-cliente') {
   
    $controller = new ClienteController($clienteRepositorio) ;
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {        
        $controller->editarCliente($_GET['cpf']) ;
    } elseif ($_SERVER['REQUEST_METHOD'] ==='POST') {
        $cliente = new Cliente($_POST['cpf'],$_POST['nome'],$_POST['endereco'],$_POST['telefone'],$_POST['email']) ;
        $controller->atualizarCliente($cliente) ;
        
    }
    
    // header('Location: ./') ;
} elseif ($route === '/excluir-cliente'){   
     $controller = new ClienteController($clienteRepositorio) ;
     $controller->deletarCliente($_GET['cpf']) ;
     header('Location: ./') ;
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
