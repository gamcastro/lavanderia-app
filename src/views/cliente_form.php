<!-- src/views/customer_form.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Clientes</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Cadastro de Clientes</h1>

  

    <form action="/public/index.php?action=create" method="POST">
             

        <div>
            <label for="CPF">CPF:</label>
            <input type="text" id="CPF" name="CPF" required>
        </div>
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="address"  required>
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
            <button type="submit">Cadastrar</button>
        </div>
    </form>
</body>
</html>
