<?php
include("../../funcoes.php");
verificar_login();

if (isset($_POST['voltar'])) {
    header("Location: ../registrar_itens.php");
    exit();
}

if (isset($_POST['btn_enviado'])) {
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $num_empenho = $_POST['num_empenho'];

    updFornecedor($nome,$cnpj,$email,$endereco,$telefone,$num_empenho, $_SESSION['idfornecedor']);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/cadastro.css">
    <title>Registrar Fornecedor</title>
</head>
<body>
    <div class="form-container">
        <h2>Atualizar fornecedor</h2>
        <form action="" method="post">
            <input type="text" name="nome" placeholder="Nome do fornecedor" required>
            <input type="text" name="cnpj" placeholder="CNPJ do fornecedor" required>
            <input type="text" name="email" placeholder="Email" required>
            <input type="text" name="endereco" placeholder="endereco" required>
            <input type="text" name="telefone" placeholder="telefone" required>
            <input type="text" name="num_empenho" placeholder="Numero de empenho" required>
            <button type="submit" name="btn_enviado">Enviar</button>
        </form>
        <form method="post" action="">
            <button name="voltar" type="submit">Voltar</button>
        </form>
    </div>
</body>
</html>