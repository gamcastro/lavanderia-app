<?php

define('APP_NAME', '/lavanderia-app');
$route = str_replace(APP_NAME, '', $_SERVER['REQUEST_URI']);
if (empty($route)) {
    $route = '/' ;
}

if ($route === '/') {
    require_once('./src/views/admin-cliente.php') ;
} elseif ($route === '/novo-cliente') {
    require_once('./src/views/cliente_form.php') ;
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
