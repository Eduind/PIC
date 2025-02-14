<?php
include("../../funcoes.php");
extract($_POST);
verificar_login();

function registrar_produto($nome,$estoque,$tamanho,$unidade){
    $consulta = "INSERT INTO tb_produtos (nomeProduto,qtdEstoque, tamanho, UnidadeMedida,ativoCategoria,ativoMarca) VALUES ('$nome',$estoque, $tamanho, '$unidade',0,0)";
    conexao($consulta);
}

if (isset($voltar)) {
    header("Location: ../registrar_itens.php");
    exit();
}

if(isset($salvar)){
    registrar_produto($nome,$estoque,$tamanho,$unidade);
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
        <h2>Registrar Produto</h2>
        <form action="" method="post">
            <input type="text" name="nome" placeholder="Nome do Produto" required>
            <input type="text" name="estoque" placeholder="Quantidade em estoque" required>
            <input type="text" name="tamanho" placeholder="Tamanho do produto" required>
            <select name="unidade">
                <option value="Kg"> Kilogramas </option>
                <option value="g"> Gramas </option>
                <option value="L"> Litros </option>
                <option value="mL"> Mililitros </option>
            </select>
            <button type="submit" name="salvar">Enviar</button>
        </form>
        <form method="post" action="">
            <button name="voltar" type="submit">Voltar</button>
        </form>
    </div>
</body>
</html>