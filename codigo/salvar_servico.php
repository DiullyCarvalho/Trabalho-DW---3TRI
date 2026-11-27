<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];

$sql = "INSERT INTO servicos (nome, descricao, preco) VALUES (?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "ssd", $nome, $descricao, $preco);

mysqli_stmt_execute($comando);

header("Location: principal.php");
?>
