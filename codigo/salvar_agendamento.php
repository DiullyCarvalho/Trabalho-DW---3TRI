<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$data = $_POST['data'];
$horario = $_POST['horario'];
$status = $_POST['status'];
$id_pet = $_POST['id_pet'];
$id_funcionario = $_POST['id_funcionario'];
$id_servicos = $_POST['id_servicos'];

$sql = "SELECT * FROM agendamento WHERE data = ? AND horario = ?";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "ss", $data, $horario);

mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);

$quantidade = mysqli_num_rows($resultado);

if ($quantidade == 0) {

    $sql = "INSERT INTO agendamento (data, horario, status, id_pet, id_funcionario, id_servicos) VALUES (?, ?, ?, ?, ?, ?)";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, "sssiii", $data, $horario, $status, $id_pet, $id_funcionario, $id_servicos);

    mysqli_stmt_execute($comando);

    echo "Horário livre! Agendamento realizado com sucesso.";
    echo "<br><br>";
    echo "<a href='principal.php'>Voltar ao início</a>";

} else {

    echo "Horário ocupado! Escolha outro horário.";
    echo "<br><br>";
    echo "<a href='cad_agendamento.php'>Voltar</a>";

}
?>