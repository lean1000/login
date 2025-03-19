<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Cadastro</title>

    <link rel="stylesheet" href="./assets/css/cadastro.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<body>
    <div class="container">
        <h2 class="text-center">Cadastro</h2>
        <form action="auxcadastro.php" method="POST">

            <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuário" required>

            <div class="form-group password-container">
                <input type="password" id="senha" name="senha" class="form-control senha" placeholder="Senha" required>
            </div>

            <div class="form-group password-container">
                <input type="password" id="confirmar-senha" name="confirmar-senha" class="form-control senha" placeholder="Confirmar Senha" required>
                <span class="eye-icon" id="togglePassword" onclick="togglePassword()">
                    <i class="bi bi-eye-slash" id="eyeIcon"></i>
                </span>
            </div>

            <input type="text" id="nome-completo" name="nome-completo" class="form-control" placeholder="Nome Completo" required>

            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="CPF" required>

            <input type="text" id="logradouro" name="logradouro" class="form-control" placeholder="Logradouro" required>

            <input type="text" id="numero-casa" name="numero-casa" class="form-control" placeholder="Número da Casa" required>

            <input type="text" id="bairro" name="bairro" class="form-control" placeholder="Bairro" required>

            <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Cidade" required>

            <input type="text" id="telefone1" name="telefone1" class="form-control" placeholder="Telefone 1" required>

            <input type="text" id="telefone2" name="telefone2" class="form-control" placeholder="Telefone 2">

            <input type="date" id="data-nascimento" name="data-nascimento" class="form-control" placeholder="Data de Nascimento" required>

            <input type="submit" class="btn btn-primary" value="Cadastrar">
        </form>
    </div>

    <script src="./assets/js/script.js"></script>

</body>

</html>