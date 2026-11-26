<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="salvar_agendamento.php" method="post" enctype="multipart/form-data">
        Data: <br>
        <input type="date" name="data"><br>

        Horário: <br>
        <input type="time" name="horario"><br>

        Status: <br>
        <input type="text" name="status"><br>

        Nome do Pet: <br>

        <select name="id_pet">

            <?php
            require_once "conexao.php";

            $sql = "SELECT * FROM pet";

            $comando = mysqli_prepare($conexao, $sql);
            mysqli_stmt_execute($comando);
            $pets = mysqli_stmt_get_result($comando);

            while ($pet = mysqli_fetch_array($pets)) {
                $id_pet= $pet['id_pet'];
                $nome = $pet['nome'];
                echo "<option value='$id_pet'>$nome</option>";
            }
            ?>
        </select> <br>


        Nome do Funcionário: <br>

        <select name="id_funcionario">

            <?php
            require_once "conexao.php";

            $sql = "SELECT * FROM funcionario";

            $comando = mysqli_prepare($conexao, $sql);
            mysqli_stmt_execute($comando);
            $funcionarios = mysqli_stmt_get_result($comando);

            while ($funcionario = mysqli_fetch_array($funcionarios)) {
                $id_funcionario= $funcionario['id_funcionario'];
                $nome = $funcionario['nome'];
                echo "<option value='$id_funcionario'>$nome</option>";
            }
            ?>
        </select> <br>

        Serviços: <br>

        <select name="id_servico">

            <?php
            require_once "conexao.php";

            $sql = "SELECT * FROM servicos";

            $comando = mysqli_prepare($conexao, $sql);
            mysqli_stmt_execute($comando);
            $servico = mysqli_stmt_get_result($comando);

            while ($servicos = mysqli_fetch_array($servico)) {
                $id_servicos= $servicos['id_servicos'];
                $nome = $servicos['nome'];
                echo "<option value='$id_servicos'>$nome</option>";
            }
            ?>
        </select> <br><br>

        <input type="submit" value="Salvar">
    </form>
</body>
</html>