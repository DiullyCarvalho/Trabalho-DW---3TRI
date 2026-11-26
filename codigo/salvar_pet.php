<?php
require_once "conexao.php";

$nome = $_POST['nome'];
$tutor = $_POST['tutor'];
$especie = $_POST['especie'];
$raca = $_POST['raca'];
$idade = $_POST['idade'];
$vacinado = $_POST['vacinado'];
$castrado = $_POST['castrado'];

$nome_arquivo = $_FILES['foto']['name'];
$caminho_temporario = $_FILES['foto']['tmp_name'];

$extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

$novo_nome = uniqid() . "." . $extensao;

$caminho_destino = "fotos_pet/" . $novo_nome;

move_uploaded_file($caminho_temporario, $caminho_destino);


$sql = "INSERT INTO pet (nome, id_tutor, especie, raca, idade, vacinado, castrado, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "sissssss", $nome, $tutor, $especie, $raca, $idade, $vacinado, $castrado, $novo_nome);

mysqli_stmt_execute($comando);

header("Location: principal.php");
?>
