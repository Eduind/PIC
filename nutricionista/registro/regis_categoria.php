<?php
include('../../funcoes.php');
verificar_login();

if (isset($_POST['voltar'])) {
    header("Location:../registrar_itens.php");
    exit();
}
if (isset($_POST['enviar'])){
    if (isset($_POST['categoria']) and isset($_POST['produto'])){
        $idcategoria = $_POST['categoria'];
        $idproduto = $_POST['produto'];
        $consulta = "INSERT INTO categoria_produto (categoria_id, produto_id) VALUES ($idcategoria,$idproduto)";
        conexao($consulta);
        $consulta = "UPDATE tb_produtos SET ativoCategoria = 1 WHERE idProdutos = $idproduto";
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
            <select name="categoria">
                <?php 
                    $busca = "SELECT idCategorias, nomeCategoria FROM tb_categorias";
                    $resultados = conexao($busca);
                    while ($dado = $resultados->fetch_assoc()): ?>
                        <option value="<?= $dado['idCategorias']; ?>"><?= $dado['nomeCategoria']; ?></option>
                <?php endwhile; ?>
            </select>
            <select name="produto">
                <?php 
                    $busca = "SELECT idProdutos, nomeProduto FROM tb_produtos WHERE ativoCategoria = 0";
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