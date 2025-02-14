<?php
include("../../funcoes.php");
extract($_POST);
verificar_login();
// Botão de voltar
if (isset($voltar)) {
    header("Location: ../registrar_itens.php");
    exit();
}

// Validação do nome
if (isset($nome) && !empty($nome)) {
    novaMarca($nome,$descricao);
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
        <h2>Registrar Marca</h2>
        <form action="" method="post">
            <input type="text" name="nome" placeholder="Nome da marca" required>
            <input type="text" name="descricao" placeholder="Descrição" required>
            <button type="submit">Enviar</button>
        </form>
        <form method="post" action="">
            <button name="voltar" type="submit">Voltar</button>
        </form>
    </div>
</body>
</html>