
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
            <td>N° do Tutor</td>
            <td>Nome</td>
            <td>CPF</td>
            <td>Telefone</td>
            <td>Email</td>
            <td>Endereço</td>
        </tr>

        <?php
        require_once "conexao.php";

        $sql = "SELECT * FROM tutor";

        $resultados = mysqli_query($conexao, $sql);

        while ($linha = mysqli_fetch_array($resultados)) {

            $id_tutor = $linha['id_tutor'];
            $nome = $linha['nome'];
            $cpf = $linha['cpf'];
            $telefone = $linha['telefone'];
            $email = $linha['email'];
            $endereco = $linha['endereco'];

            echo "<tr>";
                echo "<td>$id_tutor</td>";
                echo "<td>$nome</td>";
                echo "<td>$cpf</td>";
                echo "<td>$telefone</td>";
                echo "<td>$email</td>";
                echo "<td>$endereco</td>";

                echo "<td><a href='editar_tutor.php?id_tutor=$id_tutor'>Editar</a></td>";
            echo "</tr>";
        }
        ?>

    </table>
    <br>

</body>
</html>
