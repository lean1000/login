<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>

    <link rel="stylesheet" href="./assets/css/editar.css">


</head>

<body>
    <main>

        <h2>Editar Perfil</h2>

        <?php

        $id_aluno_alterar = $_GET['id_aluno_alterar'];

        $dsn = 'mysql:dbname=db_login;host=127.0.0.1';
        $user = 'root';
        $password = '';

        try {
            $banco = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Erro na conexão: ' . $e->getMessage();
        }

        $select = "SELECT tb_pessoa.*, tb_usuario.usuario FROM tb_pessoa INNER JOIN tb_usuario ON tb_usuario.id_pessoa = tb_pessoa.id WHERE tb_pessoa.id = " . $id_aluno_alterar;

        $dados = $banco->query($select)->fetch();

        ?>

        <form action="auxeditar.php" method="POST">

            <input type="hidden" name="id" value="<?= ($dados['id'] ?? '') ?>">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?= ($dados['nome'] ?? '') ?>" disabled>

            <label for="ano_nascimento">Ano de Nascimento:</label>
            <input type="number" name="ano_nascimento" value="<?= ($dados['ano_nascimento'] ?? '') ?>" disabled>

            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" value="<?= ($dados['cpf'] ?? '') ?>" disabled>

            <label for="telefone_1">Telefone 1:</label>
            <input type="text" name="telefone_1" value="<?= ($dados['telefone_1'] ?? '') ?>" required>

            <label for="telefone_2">Telefone 2:</label>
            <input type="text" name="telefone_2" value="<?= ($dados['telefone_2'] ?? '') ?>" required>

            <label for="logradouro">Logradouro:</label>
            <input type="text" name="logradouro" value="<?= ($dados['logradouro'] ?? '') ?>" required>

            <label for="n_casa">Número da Casa:</label>
            <input type="text" name="n_casa" value="<?= ($dados['n_casa'] ?? '') ?>" required>

            <label for="bairro">Bairro:</label>
            <input type="text" name="bairro" value="<?= ($dados['bairro'] ?? '') ?>" required>

            <label for="cidade">Cidade:</label>
            <input type="text" name="cidade" value="<?= ($dados['cidade'] ?? '') ?>" required>

            <label for="usuario">Usuário:</label>
            <input type="text" name="usuario" value="<?= ($dados['usuario'] ?? '') ?>" disabled>

            <label for="senha">Senha:</label>
            <input type="text" name="senha" value="<?= ($dados['senha'] ?? '') ?>" required>

            <input type="submit" value="Atualizar Perfil">
        </form>

    </main>
</body>

</html>

