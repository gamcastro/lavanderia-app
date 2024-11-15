<?php

use Geosoft\LavanderiaApp\config\Database;
use Geosoft\LavanderiaApp\repositorios\ClienteRepositorio;

    require __DIR__ . '/../../vendor/autoload.php' ;

    $pdo = new Database() ;
    $database = $pdo->getConnection() ;
    $clienteRepositorio = new ClienteRepositorio($database) ;
    $clienteDataList = $clienteRepositorio->All() ;
  

    
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administração de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="/../lavanderia-app/public/css/styles.css">
</head>

<body>
    <header>
        <h1 class="text-center my-3">Administração de Clientes</h1>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col">


                    <section class="detail">



                        <table class="table table-bordered border-primary">
                            <tr>
                                <th>CPF</th>
                                <th>Nome</th>
                                <th>Endereço</th>
                                <th>Telefone</th>
                                <th>E-mail</th>
                                <th colspan="2">Ações</th>
                            </tr>
                            <?php foreach ($clienteDataList as $cliente): ?>
                            <tr>
                                <td><?= $cliente->cpf ?></td>
                                <td><?= $cliente->nome ?></td>
                                <td><?= $cliente->endereco ?></td>
                                <td><?= $cliente->telefone ?></td>
                                <td><?= $cliente->email ?></td>                                
                                <td><a href="./editar-cliente?cpf=<?= $cliente->cpf ?>">Editar</a></td>
                                <td><a href="./excluir-cliente?cpf=<?= $cliente->cpf ?>">Excluir</a></td>
                            </tr>
                            <?php endforeach ;?>

                        </table>

                        <br>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <section class="cadastro">
                        <a href="./novo-cliente" class="btn btn-primary">Cadastrar Cliente</a>
                    </section>
                </div>
            </div>
        </div>
    </main>

    <footer>


    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>