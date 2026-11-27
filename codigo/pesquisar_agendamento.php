<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$pesquisa = "";

if (isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
}

$sql = "SELECT agendamento.*, pet.nome AS nome_pet,
        pet.foto AS foto_pet,
        tutor.nome AS nome_tutor,
        funcionario.nome AS nome_funcionario,
        servicos.nome AS nome_servico
        FROM agendamento, pet, tutor, funcionario, servicos
        WHERE agendamento.id_pet = pet.id_pet
        AND pet.id_tutor = tutor.id_tutor
        AND agendamento.id_funcionario = funcionario.id_funcionario
        AND agendamento.id_servicos = servicos.id_servicos
        AND pet.nome LIKE ?";

$comando = mysqli_prepare($conexao, $sql);

$busca = "%" . $pesquisa . "%";

mysqli_stmt_bind_param($comando, "s", $busca);

mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pesquisar agendamentos</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <h1>Pesquisar agendamentos</h1>

    <form action="pesquisar_agendamento.php" method="GET">

        Nome do pet:
        <br>

        <input type="text" name="pesquisa" value="<?php echo $pesquisa; ?>">

        <input type="submit" value="Pesquisar">
        <a href="principal.php">Início</a><br><br>

    </form>

    <br>

    <div class="lista">

        <?php
        if ($pesquisa != "") {

            if (mysqli_num_rows($resultado) == 0) {
                echo "Nenhum agendamento encontrado!";
            }

            while ($agendamento = mysqli_fetch_array($resultado)) {

                $id_agendamento = $agendamento['id_agendamento'];
                $nome_pet = $agendamento['nome_pet'];
                $nome_tutor = $agendamento['nome_tutor'];
                $nome_funcionario = $agendamento['nome_funcionario'];
                $nome_servico = $agendamento['nome_servico'];
                $data = $agendamento['data'];
                $horario = $agendamento['horario'];
                $status = $agendamento['status'];
                $foto = $agendamento['foto_pet'];

                echo "<img src='fotos_pet/$foto' width='100'><br>";

                echo "Pet: $nome_pet<br>";
                echo "Tutor: $nome_tutor<br>";
                echo "Funcionário: $nome_funcionario<br>";
                echo "Serviço: $nome_servico<br>";
                echo "Data: $data<br>";
                echo "Horário: $horario<br>";
                echo "Status: $status<br>";

                echo "<a href='editar_agendamento.php?id_agendamento=$id_agendamento'>Editar</a>";

                echo "<hr>";
            }
        }
        ?>

    </div>

</body>

</html>