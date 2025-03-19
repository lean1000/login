<?php
session_start();

try {
    $banco = new PDO("mysql:host=localhost;dbname=db_login", "root", "");
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST['cpf'];
    $senhaNova = $_POST['password'];
    $confirmarSenha = $_POST['password2'];

    if ($senhaNova !== $confirmarSenha) {
        echo "As senhas não coincidem!";
        exit;
    }

    $query = 'SELECT id FROM tb_pessoa WHERE cpf = :cpf';
    $stmt = $banco->prepare($query);
    $stmt->execute([':cpf' => $cpf]);
    
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

   
    if ($usuario) {
       
        $idPessoa = $usuario['id'];

 
        $updateSenha = 'UPDATE tb_usuario SET senha = :senha WHERE id_pessoa = :id_pessoa';
        $stmtUpdate = $banco->prepare($updateSenha);
        $stmtUpdate->execute([
            ':senha' => $senhaNova,  
            ':id_pessoa' => $idPessoa
        ]);

        echo '<script>
                alert("Senha alterada com sucesso!");
                window.location.replace("index.php"); // Redirecionar para a página de login
              </script>';
    } else {
   
        echo "CPF não encontrado!";
    }
}
?>

