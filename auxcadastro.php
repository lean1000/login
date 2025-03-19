<?php
$usuarioFormulario = $_POST['usuario'];
$senhaFormulario = $_POST['senha'];
$confirmarSenhaFormulario = $_POST['confirmar-senha'];
$nomeFormulario = $_POST['nome-completo'];
$cpfFormulario = $_POST['cpf'];
$logradouroFormulario = $_POST['logradouro'];
$numeroCasaFormulario = $_POST['numero-casa'];
$bairroFormulario = $_POST['bairro'];
$cidadeFormulario = $_POST['cidade'];
$telefone1Formulario = $_POST['telefone1'];
$telefone2Formulario = $_POST['telefone2'];
$dataNascimentoFormulario = $_POST['data-nascimento'];

if ($senhaFormulario !== $confirmarSenhaFormulario) {
    echo "As senhas não coincidem.";
    exit; 
}

try {
    $banco = new PDO("mysql:host=localhost;dbname=db_login", "root", "");
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
    exit;
}

$insertPessoa = 'INSERT INTO tb_pessoa (nome, ano_nascimento, cpf, telefone_1, telefone_2, logradouro, n_casa, bairro, cidade) 
                 VALUES (:nome, :ano_nascimento, :cpf, :telefone_1, :telefone_2, :logradouro, :n_casa, :bairro, :cidade)';

$boxePessoa = $banco->prepare($insertPessoa);

$boxePessoa->execute([
    ':nome' => $nomeFormulario,
    ':ano_nascimento' => $dataNascimentoFormulario,
    ':cpf' => $cpfFormulario,
    ':telefone_1' => $telefone1Formulario,
    ':telefone_2' => $telefone2Formulario,
    ':logradouro' => $logradouroFormulario,
    ':n_casa' => $numeroCasaFormulario,
    ':bairro' => $bairroFormulario,
    ':cidade' => $cidadeFormulario
]);

$idPessoa = $banco->lastInsertId();

$insertUsuario = 'INSERT INTO tb_usuario (usuario, senha, id_pessoa) 
                  VALUES (:usuario, :senha, :id_pessoa)';

$boxeUsuario = $banco->prepare($insertUsuario);

$boxeUsuario->execute([
    ':usuario' => $usuarioFormulario,
    ':senha' => password_hash($senhaFormulario, PASSWORD_DEFAULT), 
    ':id_pessoa' => $idPessoa
]);

echo '<script>
        alert("Cadastro realizado com sucesso!");
        window.location.replace("lista.php");
      </script>';
?>
