<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="salvar_funcionario.php" method="post" enctype="multipart/form-data">


        Nome do Pet: <br>
        <input type="text" name="nome"><br>

        Tutor do Pet: <br>

        <select name="tutor">

            <?php
            require_once "conexao.php";

            $sql = "SELECT * FROM tutor";

            $comando = mysqli_prepare($conexao, $sql);
            mysqli_stmt_execute($comando);
            $tutores = mysqli_stmt_get_result($comando);

            while ($tutor = mysqli_fetch_array($tutores)) {
                $id_tutor= $tutor['idtutor'];
                $nome = $tutor['nome'];
                echo "<option value='$id_tutor'>$nome</option>";
            }
            ?>
        </select> <br><br>

        Especie: <br>
        <input type="text" name="especie"><br>

        Raça: <br>
        <input type="text" name="raca"><br>

        Idade: <br>
        <input type="text" name="idade"><br>

        Foto: <br>
        <input type="file" name="foto"><br>

        Vacinado: <br>
        <input type="text" name="vacinado"><br>

        Castrado: <br>
        <input type="text" name="vacinado"> <br>


        <input type="submit" value="Salvar">
    </form>
</body>
</html>