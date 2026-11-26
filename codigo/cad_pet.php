<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="salvar_funcionario.php" method="post" enctype="multipart/form-data">


        Nome do Funcionário: <br>
        <input type="text" name="nome"><br>

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