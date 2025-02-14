<?php
include('../funcoes.php');
verificar_login();
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
            <h3>Estoque</h3>
        </div>
        <div class="container">
            <div class="content">
                <div class="content-item active" id="content-2">
                    <div class="table-container">
                        <table class="table-style">
                            <thead>
                                <tr>
                                    <th>Nome do produto</th>
                                    <th>Quantidade em estoque</th>
                                    <th>Tamanho</th>
                                    <th>Unidade de medida</th>
                                    <th>Categoria</th>
                                    <th>Marca</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php estoque() ?>
                            </tbody>
                        </table>
                    </div>
                </div>
    <script src="../javascript/teste2.js"></script>
</body>