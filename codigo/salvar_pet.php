<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$nome = $_POST['nome'];
$id_tutor = $_POST['id_tutor'];
$especie = $_POST['especie'];
$raca = $_POST['raca'];
$sexo_biologico = $_POST['sexo_biologico'];
$idade = $_POST['idade'];
$nome_arquivo = $_FILES['foto']['name'];
$caminho_temporario = $_FILES['foto']['tmp_name'];

if (isset($_POST['vacinado'])) {
    $vacinado = "sim";
} else {
    $vacinado = "nao";
}

if (isset($_POST['castrado'])) {
    $castrado = "sim";
} else {
    $castrado = "nao";
}

$extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

$novo_nome = uniqid() . "." . $extensao;

$caminho_destino = "fotos_pet/" . $novo_nome;

move_uploaded_file($caminho_temporario, $caminho_destino);


$sql = "INSERT INTO pet (nome, id_tutor, especie, raca, sexo_biologico, idade, vacinado, castrado, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "sisssssss", $nome, $id_tutor, $especie, $raca, $sexo_biologico, $idade, $vacinado, $castrado, $novo_nome);

mysqli_stmt_execute($comando);

header("Location: principal.php");
?>
