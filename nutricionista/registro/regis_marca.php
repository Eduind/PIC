<?php
include('../../funcoes.php');
verificar_login();

if (isset($_POST['voltar'])) {
    header("Location:../registrar_itens.php");
    exit();
}
if (isset($_POST['enviar'])){
    if (isset($_POST['marca']) and isset($_POST['produto'])){
        $idmarca = $_POST['marca'];
        $idproduto = $_POST['produto'];
        $consulta = "INSERT INTO marca_produto (marca_id, produto_id) VALUES ($idmarca,$idproduto)";
        conexao($consulta);
        $consulta = "UPDATE tb_produtos SET ativoMarca = 1 WHERE idProdutos = $idproduto";
        conexao($consulta);
}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/cadastro.css">
    <title>Document</title>
</head>
<body>
    <div class="form-container">
    <h2>As Produto</h2>
        <form method="post" action=""> 
            <select name="marca">
                <?php 
                    $busca = "SELECT idMarca, nomeMarca FROM tb_marca";
                    $resultados = conexao($busca);
                    while ($dado = $resultados->fetch_assoc()): ?>
                        <option value="<?= $dado['idMarca']; ?>"><?= $dado['nomeMarca']; ?></option>
                <?php endwhile; ?>
            </select>
            <select name="produto">
                <?php 
                    $busca = "SELECT idProdutos, nomeProduto FROM tb_produtos  WHERE ativoMarca = 0";
                    $resultados = conexao($busca);
                    while ($dado = $resultados->fetch_assoc()): ?>
                        <option value="<?= $dado['idProdutos']; ?>"><?= $dado['nomeProduto']; ?></option>
                <?php endwhile; ?>
            </select>
            <button name='enviar'> Registrar </button>
            <button name="voltar" type="submit">Voltar</button>
        </form>
    </div>
</body>
</html>