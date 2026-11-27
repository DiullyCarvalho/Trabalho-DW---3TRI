<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$id_agendamento = $_POST['id_agendamento'];
$id_pet = $_POST['id_pet'];
$id_funcionario = $_POST['id_funcionario'];
$id_servicos = $_POST['id_servicos'];
$data = $_POST['data'];
$horario = $_POST['horario'];
$status = $_POST['status'];

$sql = "SELECT * FROM agendamento WHERE data = ? AND horario = ? AND id_agendamento != ?";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "ssi", $data, $horario, $id_agendamento);

mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);

$quantidade = mysqli_num_rows($resultado);

if ($quantidade == 0) {

    $sql = "UPDATE agendamento SET id_pet = ?, id_funcionario = ?, id_servicos = ?, data = ?, horario = ?, status = ? WHERE id_agendamento = ?";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, "iiisssi", $id_pet, $id_funcionario, $id_servicos, $data, $horario, $status, $id_agendamento);

    mysqli_stmt_execute($comando);

     if (mysqli_stmt_execute($comando)) {

        echo "Agendamento salvo com sucesso!";

    } else {

        echo "Erro ao salvar o agendamento!";
    }

    } else {

    echo "Horário ocupado!";
    
    }

echo "<br><br>";
echo "<a href='listar_agendamento.php'>Voltar</a>";
?>