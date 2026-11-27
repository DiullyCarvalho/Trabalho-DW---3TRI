<?php

$pesquisa = "";

if (isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
}

$sql = "SELECT agendamento.*, pet.nome AS nome_pet, tutor.nome AS nome_tutor, tutor.cpf AS cpf_tutor, funcionario.nome AS nome_funcionario, funcionario.cpf AS cpf_funcionario
        FROM agendamento, pet, tutor, funcionario
        WHERE agendamento.id_pet = pet.id_pet
        AND pet.id_tutor = tutor.id_tutor
        AND agendamento.id_funcionario = funcionario.id_funcionario
        AND (pet.nome LIKE ? OR tutor.nome LIKE ? OR tutor.cpf LIKE ? OR funcionario.nome LIKE ? OR funcionario.cpf LIKE ?)";

$comando = mysqli_prepare($conexao, $sql);

$busca = "%" . $pesquisa . "%";

mysqli_stmt_bind_param($comando, "sssss", $busca, $busca, $busca, $busca, $busca);

mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pesquisar</title>
</head>

<body>

    <h1>Pesquisar agendamentos</h1>

    <a href="home.php">Ínicio</a> <br><br>

    <form action="pesquisar_servicos.php" method="GET">

        Nome do pet, tutor, funcionário ou cpf:
        <br>

        <input type="text" name="pesquisa" value="<?php echo $pesquisa; ?>">

        <input type="submit" value="Pesquisar">

    </form>

    <br>

    <?php
    while ($agendamento = mysqli_fetch_array($resultado)) {
    ?>

        Nome pet: <?php echo $agendamento['nome_pet']; ?>
        <br>

        Nome tutor: <?php echo $agendamento['nome_tutor']; ?>
        <br>

        CPF tutor: <?php echo $agendamento['cpf_tutor']; ?>
        <br>

        Nome funcionário: <?php echo $agendamento['nome_funcionario']; ?>
        <br>

        CPF funcionário: <?php echo $agendamento['cpf_funcionario']; ?>
        <br>

        Data: <?php echo $agendamento['data']; ?>
        <br>

        Horário: <?php echo $agendamento['horario']; ?>
        <br>

        Status: <?php echo $agendamento['status']; ?>
        <br>

        <a href="form_editar_servico.php?idservico=<?php echo $servico['idservico']; ?>">Editar</a>

        <hr>

    <?php
    }
    ?>

</body>

</html>