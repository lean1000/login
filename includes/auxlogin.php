<?php

$userForm = $_POST['user'];
$passwordForm = $_POST['password'];

$dsn = 'mysql:db_login;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn,$user,$password);

$consultaUsuarioSenha = 'SELECT * FROM tb_usuario WHERE  usuario = "" '.$userForm .'"AND senha ="' .$passwordForm .'"';

$resultado = $banco->query($consultaUsuarioSenha)->fetch();

if (!empty($resultado) && $resultado != false){
    header('location:loginFeito.php');
} else {
    header('location:index.php');
}