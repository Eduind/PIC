<?php
include("../../funcoes.php");
verificar_login();
extract($_POST);

function upd_produto($id,$nome,$estoque,$tamanho,$unidade,$categoria,$marca){
    $consulta = "UPDATE tb_produtos SET nomeProduto = '$nome', qtdEstoque = $estoque, tamanho = $tamanho, UnidadeMedida = '$unidade', idCategoriasFK = $categoria, tb_marca_idMarca = $marca WHERE idProdutos = $id";
    conexao($consulta);
}

if (isset($_POST['voltar'])) {
    header("Location: ../registrar_itens.php");
    exit();
}
 $id = $_SESSION['idproduto'];
$consulta = "SELECT p.idProdutos, p.nomeProduto, p.UnidadeMedida, p.tamanho, p.qtdEstoque FROM tb_produtos AS p WHERE idProdutos = '$id'";
$resultado = conexao($consulta);
$linha = $resultado->fetch_assoc();

if (isset($_POST['salvar'])) {
   
    upd_produto($id,$novo_nome,$novo_estoque,$novo_tamanho,$nova_unidade,$categoria,$marca);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/cadastro.css">
    <title>Atualizar produto</title>
</head>
<body>
    <div class="form-container">
        <h2>Atualizar produto</h2>
        <form action="" method="post">
            <input type="text" name="novo_nome" value="<?php echo $linha['nomeProduto'] ?? ''; ?>" placeholder="Nome do Produto" required>
            <input type="text" name="novo_estoque" value="<?php echo $linha['qtdEstoque'] ?? ''; ?>" placeholder="Quantidade em Estoque" required>
            <input type="text" name="novo_tamanho" value="<?php echo $linha['tamanho'] ?? ''; ?>" placeholder="Tamanho" required>
            <input type="text" name="nova_unidade" value="<?php echo $linha['UnidadeMedida'] ?? ''; ?>" placeholder="Unidade de Medida" required>
            <button type="submit" name="salvar">Enviar</button>
        </form>
        <form method="post" action="">
            <button name="voltar" type="submit">Voltar</button>
        </form>
    </div>
</body>
</html>