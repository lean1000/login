<?php 

echo '<h1>Apagar Usuário.php</h1>'; 

$dsn = 'mysql:dbname=db_login;host=127.0.0.1'; 
$user = 'root'; 
$password = ''; 

try {
    // Conexão com o banco de dados
    $banco = new PDO($dsn, $user, $password);
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Falha na conexão: ' . $e->getMessage();
    exit;
}

$idFormulario = $_GET['id']; 

// Primeiro, excluímos o usuário da tabela 'tb_usuario' usando o 'id' do usuário
$deleteUsuario = 'DELETE FROM tb_usuario WHERE id = :id'; 
$box = $banco->prepare($deleteUsuario); 
$box->execute([ 
    ':id' => $idFormulario 
]);

// Agora, excluímos a pessoa da tabela 'tb_pessoa' com base no 'id_pessoa' (garantindo que o id_pessoa exista)
$deletePessoa = 'DELETE FROM tb_pessoa WHERE id = (SELECT id_pessoa FROM tb_usuario WHERE id = :id)';
$box = $banco->prepare($deletePessoa);
$box->execute([ 
    ':id' => $idFormulario
]);

// Verificando se a exclusão foi bem-sucedida
if ($box->rowCount() > 0) {
    echo '<script>
        alert("Usuário apagado com sucesso!");
        window.location.replace("lista.php");
    </script>';
} else {
    echo '<script>
        alert("Erro ao apagar o usuário ou não foi possível excluir a pessoa, pois existem registros associados.");
        window.location.replace("lista.php");
    </script>';
}

?>

