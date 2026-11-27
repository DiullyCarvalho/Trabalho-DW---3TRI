<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$idveiculo = $_GET['id_servicos'];

$sql = "SELECT * FROM servicos WHERE id_servicos = ?";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "i", $id_servicos);

mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);

$veiculo = mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Editar serviços</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <h1>Editar serviços</h1>

    <form action="salvar_edicao_servico.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id_servicos" value="<?php echo $servico['id_servicos']; ?>">

        Nome:
        <br>
        <input type="text" name="nome" value="<?php echo $servico['nome']; ?>">
        <br><br>

        Descrição:
        <br>
        <input type="text" name="descricao" value="<?php echo $servico['descricao']; ?>">
        <br><br>

        Preço:
        <br>
        <input type="number" name="preco" value="<?php echo $servico['preco']; ?>">
        <br><br>

        Cliente:
        <br>
        <select name="idcliente">

            <?php
            $sql = "SELECT * FROM cliente";

            $comando = mysqli_prepare($conexao, $sql);

            mysqli_stmt_execute($comando);

            $clientes = mysqli_stmt_get_result($comando);

            while ($cliente = mysqli_fetch_array($clientes)) {
                $cliente_id = $cliente['idcliente'];
                $cliente_nome = $cliente['nome'];

                $selecionado = "";

                if ($cliente_id == $veiculo['idcliente']) {
                    $selecionado = "selected";
                }

                echo "<option value='$cliente_id' $selecionado>$cliente_nome</option>";
            }
            ?>

        </select>
        <br><br>

        <input type="submit" value="Salvar alterações">


    </form>

    <a href="home.php">Ínicio</a>
</body>

</html>