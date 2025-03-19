<?php

if (isset($_POST['id'], $_POST['nome'], $_POST['ano_nascimento'], $_POST['cpf'], $_POST['telefone_1'], $_POST['telefone_2'], $_POST['logradouro'], $_POST['n_casa'], $_POST['bairro'], $_POST['cidade'], $_POST['usuario'], $_POST['senha'])) {

    $editarId = $_POST['id'];
    $editarNome = $_POST['nome'];
    $datanascimento = $_POST['ano_nascimento'];
    $cpf = $_POST['cpf'];
    $tel1 = $_POST['telefone_1'];
    $tel2 = $_POST['telefone_2'];
    $logra = $_POST['logradouro'];
    $ncasa = $_POST['n_casa'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $dsn = 'mysql:dbname=db_login;host=127.0.0.1';
    $user = 'root';
    $password = '';

    try {
        $banco = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo 'Erro na conexão: ' . $e->getMessage();
    }

    $update_pessoa = 'UPDATE tb_pessoa SET 
                        nome = :nome,
                        ano_nascimento = :ano_nascimento,
                        cpf = :cpf,
                        telefone_1 = :telefone_1,
                        telefone_2 = :telefone_2,
                        logradouro = :logradouro,
                        n_casa = :n_casa,
                        bairro = :bairro,
                        cidade = :cidade
                    WHERE id = :id';

    $box_pessoa = $banco->prepare($update_pessoa);

    $box_pessoa->execute([
        ':id' => $editarId,
        ':nome' => $editarNome,
        ':ano_nascimento' => $datanascimento,
        ':cpf' => $cpf,
        ':telefone_1' => $tel1,
        ':telefone_2' => $tel2,
        ':logradouro' => $logra,
        ':n_casa' => $ncasa,
        ':bairro' => $bairro,
        ':cidade' => $cidade
    ]);

    $update_usuario = 'UPDATE tb_usuario SET 
                         usuario = :usuario,
                         senha = :senha
                       WHERE id_pessoa = :id';

    $box_usuario = $banco->prepare($update_usuario);

    $box_usuario->execute([
        ':id' => $editarId,
        ':usuario' => $usuario,
        ':senha' => $senha
    ]);

    echo '<script>
        alert("Cadastro atualizado com sucesso!");
        window.location.replace("lista.php");
    </script>';
} else {
    echo '<script>
        alert("Erro: Todos os campos são obrigatórios!");
        window.location.replace("lista.php");
    </script>';
}
