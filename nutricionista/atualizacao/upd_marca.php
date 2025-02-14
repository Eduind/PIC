<?php
include("../../funcoes.php");
verificar_login();

if (isset($_POST['voltar'])) {
    header("Location: ../registrar_itens.php");
    exit();
}

if (isset($_POST['btn_enviado'])) {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    updMarca($nome,$descricao,$_SESSION['idmarca']);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/cadastro.css">
    <title>Registrar Marca</title>
</head>
<body>
    <div class="form-container">
        <h2>Atualizar marca</h2>
        <form action="" method="post">
            <input type="text" name="nome" placeholder="Nome da marca" required>
            <input type="text" name="descricao" placeholder="Descrição" required>
            <button type="submit" name="btn_enviado">Enviar</button>
        </form>
        <form method="post" action="">
            <button name="voltar" type="submit">Voltar</button>
        </form>
    </div>
</body>
</html>