
<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$id_servicos = $_GET['id_servicos'];

$sql = "SELECT * FROM servicos WHERE id_servicos = ?";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "i", $id_servicos);

mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);

$servico = mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar serviço</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <h1>Editar serviço</h1>

    <form action="salvar_edicao_servicos.php" method="post">

        <input type="hidden" name="id_servicos" value="<?php echo $servico['id_servicos']; ?>">

        Nome:
        <br>
        <input type="text" name="nome" value="<?php echo $servico['nome']; ?>">
        <br><br>

        Descrição:
        <br>
        <textarea name="descricao"><?php echo $servico['descricao']; ?></textarea>
        <br><br>

        Preço:
        <br>
        <input type="number" step="0.01" name="preco" value="<?php echo $servico['preco']; ?>">
        <br><br>

        <input type="submit" value="Salvar alterações">

    </form>

    <br><br>

    <a href="listar_servicos.php">Voltar</a>

</body>

</html>
