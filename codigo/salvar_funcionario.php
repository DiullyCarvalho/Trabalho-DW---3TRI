<?php
require_once "conexao.php";

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$nova_senha = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO funcionario (nome, cpf, email, senha) VALUES (?, ?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "ssss", $nome, $cpf, $email, $nova_senha);

mysqli_stmt_execute($comando);

header("Location: index.php");
?>
