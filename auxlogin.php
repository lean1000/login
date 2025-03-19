<?php
// Captura os dados do formulário
$userForm = $_POST['user'];
$passwordForm = $_POST['password'];

// Conexão com o banco de dados
$dsn = 'mysql:host=127.0.0.1;dbname=db_login';
$user = 'root';
$password = '';

try {
    $banco = new PDO($dsn, $user, $password);
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configuração para lançar exceções em caso de erro
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
    exit;
}

// Consultar o banco de dados usando consulta preparada (para evitar injeção de SQL)
$consultaUsuarioSenha = 'SELECT * FROM tb_usuario WHERE usuario = :usuario AND senha = :senha';
$stmt = $banco->prepare($consultaUsuarioSenha);
$stmt->execute([
    ':usuario' => $userForm,
    ':senha' => $passwordForm
]);

// Verificar se o usuário e senha existem
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

if ($resultado) {
    // Redireciona para a página lista.php se o usuário e senha forem válidos
    header('location: lista.php');
    exit;
} else {
    // Caso contrário, redireciona para a página de login (index.php)
    header('location: index.php');
    exit;
}
?>
