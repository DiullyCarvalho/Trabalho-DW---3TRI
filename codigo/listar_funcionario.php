
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Serviços</title>
    <style>
        table, tr, td {
            border-style: solid;
        }
    </style>
</head>
<body>

    <h2>Lista  de Funconários </h2>

    <table>
        <tr>
            <td>N° de Funconários</td>
            <td>Nome</td>
            <td>CPF</td>
            <td>Email</td>
        </tr>

        <?php
        require_once "conexao.php";

        $sql = "SELECT * FROM funcionario";

        $resultados = mysqli_query($conexao, $sql);

        while ($linha = mysqli_fetch_array($resultados)) {

            $id_funcionario = $linha['id_funcionario'];
            $nome = $linha['nome'];
            $cpf = $linha['cpf'];
            $email = $linha['email'];

            echo "<tr>";
                echo "<td>$id_funcionario</td>";
                echo "<td>$nome</td>";
                echo "<td>$cpf</td>";
                echo "<td>$email</td>";
                echo "<td><a href='editar_funcionario.php?id_funcionario=$id_funcionario'>Editar</a></td>";
            echo "</tr>";
        }
        ?>

    </table>
    <br>

</body>
</html>
