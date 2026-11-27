<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, tr, td {
            border-style: solid;
        }
    </style>
</head>
<body>
    <h2>Lista Agendamento</h2>

    <table>
        <tr>
            <td>N° Agendamento</td>
            <td>Nome pet</td>
            <td>Nome tutor</td>
            <td>Nome funcionário</td>
            <td>Serviço</td>
            <td>Data</td>
            <td>Horário</td>
            <td>Status</td>
        </tr>
        <?php
        require_once "conexao.php";
        
        $sql = "SELECT agendamento.*, pet.nome AS nome_pet, tutor.nome AS nome_tutor,
        funcionario.nome AS nome_funcionario, servicos.nome AS nome_servico
        FROM agendamento, pet, tutor, funcionario, servicos
        WHERE agendamento.id_pet = pet.id_pet
        AND pet.id_tutor = tutor.id_tutor
        AND agendamento.id_funcionario = funcionario.id_funcionario
        AND agendamento.id_servicos = servicos.id_servicos";
        
        $resultados = mysqli_query($conexao, $sql);
        
        //quebra a variável $resultados em linhas (vetores/array)
        while ($linha = mysqli_fetch_array($resultados)) {
            $id_agendamento = $linha['id_agendamento'];
            $nome_pet = $linha['nome_pet'];
            $nome_tutor = $linha['nome_tutor'];
            $nome_funcionario = $linha['nome_funcionario'];
            $nome_servico = $linha['nome_servico'];
            $data = $linha['data'];
            $horario = $linha['horario'];
            $status = $linha['status'];
            
            echo "<tr>";
                echo "<td>$id_agendamento</td>";
                echo "<td>$nome_pet</td>";
                echo "<td>$nome_tutor</td>";
                echo "<td>$nome_funcionario</td>";
                echo "<td>$nome_servico</td>";
                echo "<td>$data</td>";
                echo "<td>$horario</td>";
                echo "<td>$status</td>";
                echo "<td><a href='editar_agendamento.php?id_agendamento=$id_agendamento'>Editar</a></td>";
            echo "</tr>";
        }
            
            
            ?>

    </table>
    <br>
</body>
</html>