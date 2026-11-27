<?php
require_once "verificar_sessao.php";
require_once "conexao.php";
$data = $_POST['data'];
$horario = $_POST['horario'];
$status = $_POST['status'];
$id_pet = $_POST['id_pet'];
$id_funcionario = $_POST['id_funcionario'];
$id_servicos = $_POST['id_servico'];

$sql = "INSERT INTO agendamento (data, horario, status, id_pet, id_funcionario, id_servicos) VALUES (?, ?, ?, ?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "sssiii", $data, $horario, $status, $id_pet, $id_funcionario, $id_servicos);

mysqli_stmt_execute($comando);

header("Location: principal.php");
?>
