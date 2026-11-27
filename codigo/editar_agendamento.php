<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$id_agendamento = $_GET['id_agendamento'];

$sql = "SELECT * FROM agendamento WHERE id_agendamento = ?";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "i", $id_agendamento);

mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);

$agendamento = mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar agendamento</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <h1>Editar agendamento</h1>

    <form action="salvar_edicao_agendamento.php" method="post">

        <input type="hidden" name="id_agendamento" value="<?php echo $agendamento['id_agendamento']; ?>">

        Nome do pet:
        <br>
        <select name="id_pet">

            <?php
            $sql = "SELECT * FROM pet";

            $comando = mysqli_prepare($conexao, $sql);

            mysqli_stmt_execute($comando);

            $pets = mysqli_stmt_get_result($comando);

            while ($pet = mysqli_fetch_array($pets)) {

                $id_pet = $pet['id_pet'];
                $nome_pet = $pet['nome'];

                $selecionado = "";

                if ($id_pet == $agendamento['id_pet']) {
                    $selecionado = "selected";
                }

                echo "<option value='$id_pet' $selecionado>$nome_pet</option>";
            }
            ?>

        </select>
        <br><br>

        Nome do funcionário:
        <br>
        <select name="id_funcionario">

            <?php
            $sql = "SELECT * FROM funcionario";

            $comando = mysqli_prepare($conexao, $sql);

            mysqli_stmt_execute($comando);

            $funcionarios = mysqli_stmt_get_result($comando);

            while ($funcionario = mysqli_fetch_array($funcionarios)) {

                $id_funcionario = $funcionario['id_funcionario'];
                $nome_funcionario = $funcionario['nome'];

                $selecionado = "";

                if ($id_funcionario == $agendamento['id_funcionario']) {
                    $selecionado = "selected";
                }

                echo "<option value='$id_funcionario' $selecionado>$nome_funcionario</option>";
            }
            ?>

        </select>
        <br><br>

        Serviço:
        <br>
        <select name="id_servicos">

            <?php
            $sql = "SELECT * FROM servicos";

            $comando = mysqli_prepare($conexao, $sql);

            mysqli_stmt_execute($comando);

            $servicos = mysqli_stmt_get_result($comando);

            while ($servico = mysqli_fetch_array($servicos)) {

                $id_servicos = $servico['id_servicos'];
                $nome_servico = $servico['nome'];

                $selecionado = "";

                if ($id_servicos == $agendamento['id_servicos']) {
                    $selecionado = "selected";
                }

                echo "<option value='$id_servicos' $selecionado>$nome_servico</option>";
            }
            ?>

        </select>
        <br><br>

        Data:
        <br>
        <input type="date" name="data" value="<?php echo $agendamento['data']; ?>">
        <br><br>

        Horário:
        <br>
        <input type="time" name="horario" value="<?php echo $agendamento['horario']; ?>">
        <br><br>

        Status:
        <br>
        <input type="text" name="status" value="<?php echo $agendamento['status']; ?>">
        <br><br>

        <input type="submit" value="Salvar alterações">

    </form>

    <br><br>

    <a href="listar_agendamento.php">Voltar</a>

</body>

</html>