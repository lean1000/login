<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<body>
    <form action="auxlogin.php" method="post">
        <h1>Login</h1>
        <input type="text" name="user" placeholder="usuário">

        <div class="password-container">
            <input type="password" name="password" placeholder="senha" id="inputPassword">
            <span class="eye-icon" id="togglePassword" onclick="togglePassword()">
                <i class="bi bi-eye-slash" id="eyeIcon"></i>
            </span>
        </div>
        <div class="box">

            <a href="cadastro.php" class="links">cadastre-se</a>
            <a href="#" class="links">/</a>
            <a href="recuperarSenha.php" class="links">esqueseu a senha ?</a>
       
        </div>
        <input type="submit" value="Entrar">

    </form>

   <script src="./assets/js/script.js"></script>

</body>

</html>