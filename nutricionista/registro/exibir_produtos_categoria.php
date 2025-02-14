<?php
include('../../funcoes.php');
verificar_login();

if (isset($_POST['voltar'])) {
    header("Location: ../registrar_itens.php");
    exit();
}

$idCategoria = $_SESSION['idCategoria'];
$consulta = "SELECT cp.id, p.idProdutos, p.nomeProduto, p.tamanho, p.UnidadeMedida, c.nomeCategoria 
            FROM tb_categorias c
            LEFT JOIN categoria_produto cp ON c.idCategorias = cp.categoria_id 
            LEFT JOIN tb_produtos p ON p.idProdutos = cp.produto_id 
            WHERE c.idCategorias = $idCategoria";

$resultado = conexao($consulta);

// Armazenar todos os registros em um array
$dados = [];
while ($linha = $resultado->fetch_assoc()) {
    $dados[] = $linha;
}

if (!empty($dados)){
    $nomeCategoria = $dados[0]['nomeCategoria'];
}

if (isset($_POST['remover'])) {
    // Converte para inteiro para segurança
    $id = (int) $_POST['remover'];
    $idProduto = (int) $_POST['idProdutos'];
    
    $consulta = "DELETE FROM categoria_produto WHERE id = $id";
    conexao($consulta);
    
    $consulta = "UPDATE tb_produtos SET ativoCategoria = 0 WHERE idProdutos = $idProduto";
    conexao($consulta);
    
    // Após a remoção, você pode desejar redirecionar ou atualizar a lista
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itens da Marca</title>
    <style>
        .table-style {
            width: 100%;
            border-collapse: collapse;
        }
        .table-style th, .table-style td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        .btn-atz {
            background: none;
            border: none;
            cursor: pointer;
        }
        .btn-icon {
            width: 20px;
            height: 20px;
        }
    </style>
</head>
<body>
    <div>
        <h2>Categoria - <?php echo htmlspecialchars($nomeCategoria); ?></h2>
        <table class="table-style">
            <thead>
                <tr>
                    <th>Nome do Produto</th>
                    <th>Tamanho</th>
                    <th>Unidade de Medida</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($dados)): ?>
                    <?php if ($dados[0]['id'] != NULL): ?>
                        <?php foreach ($dados as $linha): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($linha['nomeProduto']); ?></td>
                                <td><?php echo htmlspecialchars($linha['tamanho']); ?></td>
                                <td><?php echo htmlspecialchars($linha['UnidadeMedida']); ?></td>
                                <td>
                                    <form method="post" style="display:inline;">
                                        <button type="submit" name="remover" value="<?php echo htmlspecialchars($linha['id']); ?>" class="btn-atz">Remover</button>
                                        <input type="hidden" name="idProdutos" value="<?php echo htmlspecialchars($linha['idProdutos']); ?>">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">Nenhum registro encontrado.</td>
                        </tr>
                    <?php endif; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Nenhum registro encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <form method="post">
            <button name="voltar" type="submit">Voltar</button>
        </form>
    </div>
</body>
</html>
