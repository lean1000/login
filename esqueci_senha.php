<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<body>
    <form action="auxlogin.php" method="post">
        <h1>Recuperar Senha</h1>
        <h2>Digite seu cpf para alterar a senha.</h2>
        <input type="text" name="cpf" placeholder="CPF">

        <div class="password-container">
            <input type="password" name="password" placeholder="senha nova" id="inputPassword">
        </div>
        <div class="password-container">
            <input type="password" name="password" placeholder="confirmar senha" id="inputPassword">
            <span class="eye-icon" id="togglePassword" onclick="togglePassword()">
                <i class="bi bi-eye-slash" id="eyeIcon"></i>
            </span>
        </div>
        
        <input type="submit" value="Alterar">

    </form>

   <script src="./assets/js/script.js"></script>

</body>

</html>