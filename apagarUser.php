<?php 

echo '<h1>Apagar Usuário.php</h1>'; 

$dsn = 'mysql:dbname=db_login;host=127.0.0.1'; 
$user = 'root'; 
$password = ''; 

try {
    $banco = new PDO($dsn, $user, $password);
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Falha na conexão: ' . $e->getMessage();
    exit;
}

$idFormulario = $_GET['id']; 

$selectIdPessoa = 'SELECT id_pessoa FROM tb_usuario WHERE id = :id';
$box = $banco->prepare($selectIdPessoa);
$box->execute([':id' => $idFormulario]);
$idPessoa = $box->fetchColumn();

if ($idPessoa) {
    $deleteUsuario = 'DELETE FROM tb_usuario WHERE id = :id'; 
    $box = $banco->prepare($deleteUsuario); 
    $box->execute([':id' => $idFormulario]);

    $deletePessoa = 'DELETE FROM tb_pessoa WHERE id = :id_pessoa';
    $box = $banco->prepare($deletePessoa);
    $box->execute([':id_pessoa' => $idPessoa]);

    if ($box->rowCount() > 0) {
        echo '<script>
            alert("Usuário apagado com sucesso!");
            window.location.replace("lista.php");
        </script>';
    } else {
        echo '<script>
            alert("Usuário apagado, mas não foi possível excluir a pessoa, pois existem registros associados.");
            window.location.replace("lista.php");
        </script>';
    }
} else {
    echo '<script>
        alert("Usuário não encontrado.");
        window.location.replace("lista.php");
    </script>';
}

?>