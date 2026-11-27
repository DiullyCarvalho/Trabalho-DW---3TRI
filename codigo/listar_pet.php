
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

    <h2>Lista  dos Pets </h2>

    <table>
        <tr>
            <td>N° dos Pets</td>
            <td>Nome do Tutor</td>
            <td>Nome</td>
            <td>Idade</td>
            <td>Especie</td>
            <td>Raça</td>
            <td>Sexo</td>
            <td>Idade</td>
            <td>vacinado</td>
            <td>Castrado</td>

        </tr>

        <?php
        require_once "conexao.php";
    
        $sql = "SELECT pet.*, tutor.nome AS nome_tutor
        FROM pet
        INNER JOIN tutor
        ON pet.id_tutor = tutor.id_tutor";

        $resultados = mysqli_query($conexao, $sql);

        while ($linha = mysqli_fetch_array($resultados)) {

            $id_pet = $linha['id_pet'];
            $nome_tutor = $linha['nome_tutor'];
            $nome = $linha['nome'];
            $especie = $linha['especie'];
            $raca = $linha['raca'];
            $sexo = $linha['sexo'];
            $idade = $linha['idade'];
            $vacinado = $linha['vacinado'];
            $castrado = $linha['castrado'];
            

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
