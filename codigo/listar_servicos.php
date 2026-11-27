
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

    <h2>Lista Serviços</h2>

    <table>
        <tr>
            <td>N° Serviço</td>
            <td>Nome</td>
            <td>Descrição</td>
            <td>Preço</td>
        </tr>

        <?php
        require_once "conexao.php";

        $sql = "SELECT * FROM servicos";

        $resultados = mysqli_query($conexao, $sql);

        while ($linha = mysqli_fetch_array($resultados)) {

            $id_servicos = $linha['id_servicos'];
            $nome = $linha['nome'];
            $descricao = $linha['descricao'];
            $preco = $linha['preco'];

            echo "<tr>";
                echo "<td>$id_servicos</td>";
                echo "<td>$nome</td>";
                echo "<td>$descricao</td>";
                echo "<td>$preco</td>";
                echo "<td><a href='editar_servicos.php?id_servicos=$id_servicos'>Editar</a></td>";
            echo "</tr>";
        }
        ?>

    </table>
    <br>

</body>
</html>
