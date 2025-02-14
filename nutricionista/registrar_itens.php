<?php
include('../funcoes.php');
verificar_login();

function processarDelecao($acao, $items, $tabela, $tipoid) {
    if (isset($_POST[$acao])) {
        if (!empty($_POST[$items])) {
            foreach ($_POST[$items] as $id) {
                deletar($id, $tabela, $tipoid);
            }
        }
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

function processarRedirecionamento($acao, $url) {
    if (isset($_POST[$acao])) {
        header("Location: $url");
        exit();
    }
}

if(isset($_POST['atualizarCategoria'])){
    $_SESSION['idcategoria'] = $_POST['atualizarCategoria'];

}

if(isset($_POST['exibirCategoria'])){
    $_SESSION['idCategoria'] = $_POST['exibirCategoria'];

}
if(isset($_POST['exibirMarca'])){
    $_SESSION['idMarca'] = $_POST['exibirMarca'];

}

if(isset($_POST['atualizarProduto'])){
    $_SESSION['idproduto'] = $_POST['atualizarProduto'];
}

if(isset($_POST['atualizarMarca'])){
    $_SESSION['idmarca'] = $_POST['atualizarMarca'];

}

if(isset($_POST['atualizarFornecedor'])){
    $_SESSION['idfornecedor'] = $_POST['atualizarFornecedor'];

}


if(isset($_POST['btn_logout'])){
    logout();
}


// Processar ações de exclusão
processarDelecao('deletarCategoria', 'itensCategoria', 'tb_categorias', 'idCategorias');
processarDelecao('deletarFornecedor', 'itensFornecedor', 'tb_fornecedor', 'idFornecedor');
processarDelecao('deletarMarca', 'itensMarca', 'tb_marca', 'idMarca');

// Processar redirecionamentos
processarRedirecionamento('atualizarCategoria', 'atualizacao/upd_categoria.php');
processarRedirecionamento('atualizarMarca', 'atualizacao/upd_marca.php');
processarRedirecionamento('atualizarFornecedor', 'atualizacao/upd_fornecedor.php');
processarRedirecionamento('atualizarProduto', 'atualizacao/upd_produto.php');
processarRedirecionamento('btn_novoCategoria', 'cadastro/criar_categoria.php');
processarRedirecionamento('btn_novoMarca', 'cadastro/criar_marca.php');
processarRedirecionamento('btn_novoFornecedor', 'cadastro/criar_fornecedor.php');
processarRedirecionamento('btn_novoProduto', 'cadastro/criar_produto.php');
processarRedirecionamento('categoria_produto', 'registro/regis_categoria.php');
processarRedirecionamento('marca_produto', 'registro/regis_marca.php');
processarRedirecionamento('exibirCategoria', 'registro/exibir_produtos_categoria.php');
processarRedirecionamento('exibirMarca', 'registro/exibir_produtos_marca.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registro_itens.css">
    <title>Layout do Site</title>
</head>
<body>
    <div class="sidebar">
        <div class="icone">
            <button id="btn"><img src="../img/menu.png" alt="Menu"></button>
        </div>
        <ul class="nav-list">
            <li><a href="registrar_itens.php"><img src="../img/inventario.png" alt="Registrar itens"><span class="link-name">Registrar itens</span></a></li>
            <li><a href="estoque.php"><img src="../img/caixa.png" alt="Estoque"><span class="link-name">Estoque</span></a></li>
            <li><a href="#"><img src="../img/entrega.png" alt="Pedidos"><span class="link-name">Pedidos</span></a></li>
            <li><a href="#"><img src="../img/relatorio.png" alt="Relatórios"><span class="link-name">Relatórios</span></a></li>
        </ul>
        <div class="log-out">
            <form method="post" action=""> <button id="btn-logout" name="btn_logout"><img src="../img/logout.png" alt="Logout"></button></form>
        </div>
    </div>

    <div class="main">
        <div class="barra-superior">
            <h3>Registro de itens</h3>
        </div>
        <div class="container">
            <div class="cards">
                <div class="card active" data-content="2">Categorias</div>
                <div class="card" data-content="1">Produtos</div>
                <div class="card" data-content="3">Marca</div>
                <div class="card" data-content="4">Fornecedor</div>
            </div>

            <div class="content">
                <div class="content-item active" id="content-2">
                    <form method="post" action="">
                        <div class="action-buttons">
                            <button name="btn_novoCategoria" class="novo">+ Novo</button>
                            <button name="deletarCategoria" class="deletar"><img src="../img/lixeira.png" class="btn-icon"></button>
                            <button name="categoria_produto"> inserir produtos</button>
                        </div>
                        <div class="table-container">
                            <table class="table-style">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nome da Categoria</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php mostrar_categoria(); ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="content-item" id="content-1">
                    <form method="post" action="">
                    <div class="action-buttons">
                        <button name="btn_novoProduto" class="novo">+ Novo</button>
                        <button name="deletarProduto" class="deletar"><img src="../img/lixeira.png" class="btn-icon"></button>
                    </div>
                    <div class="table-container">
                        <table class="table-style">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nome do Produto</th>
                                    <th>Tamanho</th>
                                    <th>Unidade de medida</th>
                                    <th>Categoria</th>
                                    <th>Marca</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php mostrar_produtos()?>
                            </tbody>
                        </table>
                    </div>
                    </form>
                </div>
                <div class="content-item" id="content-3">
                    <form method="post" action="">
                        <div class="action-buttons">
                            <button name="btn_novoMarca" class="novo">+ Novo</button>
                            <button name="deletarMarca" class="deletar"><img src="../img/lixeira.png" class="btn-icon"></button>
                            <button name="marca_produto"> Inserir produtos</button>
                        </div>
                        <div class="table-container">
                            <table class="table-style">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nome da Marca</th>
                                        <th>Descrição</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php mostrar_marca(); ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="content-item" id="content-4">
                    <form method="post" action="">
                        <div class="action-buttons">
                            <button name="btn_novoFornecedor" class="novo">+ Novo</button>
                            <button name="deletarFornecedor" class="deletar"><img src="../img/lixeira.png" class="btn-icon"></button>
                        </div>
                        <div class="table-container">
                            <table class="table-style">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nome do Fornecedor</th>
                                        <th>CNPJ</th>
                                        <th>Email</th>
                                        <th>Telefone</th>
                                        <th>Endereço</th>
                                        <th>Numero de empenho</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php mostrar_fornecedor(); ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../javascript/teste2.js"></script>
</body>
</html>