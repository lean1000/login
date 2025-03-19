<?php

$id_user = $_GET['id'];

$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$select = "SELECT tb_pessoa.*, tb_usuario.usuario 
           FROM tb_usuario 
           INNER JOIN tb_pessoa ON tb_usuario.id_pessoa = tb_pessoa.id 
           WHERE tb_pessoa.id = :id_user";

$stmt = $banco->prepare($select);
$stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
$stmt->execute();
$dados = $stmt->fetch();

if (!$dados) {
    die("Usuário não encontrado.");
}

?>

<link rel="stylesheet" href="./assets/css/ficha.css">

<main class="container">

    <h1>Ficha Pessoal</h1>

    <form>
        <div class="row">
            <div class="col">
                <label for="nome">Nome:</label>
                <input type="text" value="<?= ($dados['nome'] ?? '') ?>" disabled>

                <label for="telefone">Telefone 1:</label>
                <input type="text" value="<?= ($dados['telefone_1'] ?? '') ?>" disabled>

                <label for="telefone">Telefone 2:</label>
                <input type="text" value="<?= ($dados['telefone_2'] ?? '') ?>" disabled>

                <label for="cpf">CPF:</label>
                <input type="text" value="<?= ($dados['cpf'] ?? '') ?>" disabled>

                <label for="logradouro">Logradouro:</label>
                <input type="text" value="<?= ($dados['logradouro'] ?? '') ?>" disabled>
            </div>

            <div class="col">
                <label for="n_casa">Número da Casa:</label>
                <input type="text" value="<?= ($dados['n_casa'] ?? '') ?>" disabled>

                <label for="bairro">Bairro:</label>
                <input type="text" value="<?= ($dados['bairro'] ?? '') ?>" disabled>

                <label for="cidade">Cidade:</label>
                <input type="text" value="<?= ($dados['cidade'] ?? '') ?>" disabled>

                <label for="data_nascimento">Ano de Nascimento:</label>
                <input type="text" value="<?= ($dados['ano_nascimento'] ?? '') ?>" disabled>
            </div>
        </div>
    </form>
</main>