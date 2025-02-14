<?php
include("../../funcoes.php");
verificar_login();

if (isset($_POST['voltar'])) {
    header("Location: ../registrar_itens.php");
    exit();
}

// Validação do nome
if (isset($_POST['btn_enviado'])) {
    $nome = $_POST['nome'];
    updCategoria($nome,$_SESSION['idcategoria']);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/cadastro.css">
    <title>Atualizar categoria</title>
</head>
<body>
    <div class="form-container">
        <h2>Atualizar categoria</h2>
        <form action="" method="post">
            <input type="text" name="nome" placeholder="Nome da categoria" required>
            <button type="submit" name="btn_enviado">Enviar</button>
        </form>
        <form method="post" action="">
            <button name="voltar" type="submit">Voltar</button>
        </form>
    </div>
</body>
</html>