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

    <?php
    if(isset($_SESSION['error_message'])){
        echo "<div class='error'>" . $_SESSION['error_message'] . "</div>";
        unset($_SESSION['error_message']);
    }

    if(isset($_SESSION['success_message'])){
        echo "<div class='success'>" . $_SESSION['success_message'] . "</div>";
        unset($_SESSION['success_message']);
    }
    ?>

    <form action="/public/index.php?action=create" method="POST">
        <!-- Token CSRF -->
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

        <div>
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required>
        </div>
        <div>
            <label for="address">Endereço:</label>
            <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($_POST['address'] ?? ''); ?>" required>
        </div>
        <div>
            <label for="phone">Telefone:</label>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>" required>
        </div>
        <div>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
        </div>
        <div>
            <button type="submit">Cadastrar</button>
        </div>
    </form>
</body>
</html>
