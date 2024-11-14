<!-- src/views/customer_form.php -->
 <?php

use Geosoft\LavanderiaApp\config\Database;
use Geosoft\LavanderiaApp\modelos\Cliente;
use Geosoft\LavanderiaApp\repositorios\ClienteRepositorio;

 if (isset($_POST['cadastrar'])) {
    $pdo = new Database() ;
    
    $cliente = new Cliente(
        $_POST['cpf'],
        $_POST['nome'],
        $_POST['endereco'],
        $_POST['telefone'],
        $_POST['email'],
        null
    ) ;

    $clienteRepositorio = new ClienteRepositorio($pdo->getConnection()) ;
    if ($clienteRepositorio->adicionarCliente($cliente)) {
         header('Location: '  . './') ;
    } else {
        echo "Cliente não cadastrado" ;
    }
 } 
 ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Clientes</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Cadastro de Clientes</h1>

  

    <form method="POST">
             

        <div>
            <label for="CPF">CPF:</label>
            <input type="text" id="cpf" name="cpf" required>
        </div>
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome"  required>
        </div>
        <div>
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" required>
        </div>
        <div>
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone"  required>
        </div>
        <div>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email"  required>
        </div>
        <div>
            <button type="submit" name="cadastrar">Cadastrar</button>
        </div>
    </form>
</body>
</html>
