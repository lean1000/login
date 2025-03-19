<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista</title>
    <link rel="stylesheet" href="./assets/css/lista.css">
</head>

<body>
    <main class="container">
        <h2 class="text-center">Lista de Usuários</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuários</th>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $dsn = 'mysql:dbname=db_login;host=127.0.0.1';
                $user = 'root';
                $password = '';

                $banco = new PDO($dsn, $user, $password);
                $select = "SELECT * FROM tb_usuario";
                $resultado = $banco->query($select)->fetchAll();

                foreach ($resultado as $linha) { 
                ?>
                    <tr>
                        <td><?= $linha['id'] ?></td>
                        <td><?= $linha['usuario'] ?></td>
                        <td class="text-center">
                            <a class="btn btn-abrir" href="ficha.php?id=<?= $linha['id'] ?>">Abrir</a>
                            <a class="btn btn-editar" href="editar.php?id_aluno_alterar=<?= $linha['id'] ?>">Editar</a>
                            <a class="btn btn-excluir" href="apagarUser.php?id=<?= $linha['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>

</html>