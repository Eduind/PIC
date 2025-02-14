<?php
    session_start();

    function logout(){
        unset($_SESSION['login']);

        header('Location:../login.php');
    }

    function verificar_login(){
        if ($_SESSION['login'] != true){
            header('Location: ../login.php');
            exit();
        }
    }

    function conexao($consulta) {
        $banco = new mysqli("localhost", "root", "eduardo1310", "mydb");
        if ($banco->connect_error) {
            echo "Falha de conexão referência: (" . $banco->connect_errno . ") - " . $banco->connect_error;
            exit();
        }
        if (!$resultado = $banco->query($consulta)) {
            echo "Falha na consulta referência: (" . $banco->errno . ") - " . $banco->error;
            exit();
        }
        $banco->close();
        return $resultado;
    }


    function deletar($id,$tabela,$tipoid) {
        $consulta = "DELETE FROM $tabela WHERE $tipoid ='$id'";
        conexao($consulta);
    }

    // CRUD Categoria 
    function novaCategoria($nome){
        $consulta = "INSERT INTO tb_categorias (nomeCategoria) VALUES ('$nome')";
        conexao($consulta);
    }

    function updCategoria($novo_nome,$id){
        $consulta = "UPDATE tb_categorias SET nomeCategoria='$novo_nome' WHERE idCategorias='$id'";
        conexao($consulta);
    }

    // CRUD Marca
    function novaMarca($nome,$descricao){
        $consulta = "INSERT INTO tb_marca (nomeMarca,descricao) VALUES ('$nome','$descricao')";
        conexao($consulta);
    }

    function updMarca($novo_nome,$descricao,$id){
        $consulta = "UPDATE tb_marca SET nomeMarca='$novo_nome', descricao = '$descricao' WHERE idMarca='$id'";
        conexao($consulta);
    }

    //CRUD fornecedor
    function novoFornecedor($nome,$cnpj,$email,$endereco,$telefone,$num_empenho){
        $consulta = "INSERT INTO tb_fornecedor (nomeFornecedor,cnpj,email,endereco,telefone,NUM_Empenho) VALUES ('$nome','$cnpj','$email','$endereco','$telefone','$num_empenho')";
        conexao($consulta);
    }

    function updFornecedor($nome,$cnpj,$email,$endereco,$telefone,$num_empenho,$id){
        $consulta = "UPDATE tb_fornecedor SET nomeFornecedor = '$nome', cnpj = '$cnpj', email = '$email', endereco = '$endereco', telefone = '$telefone', NUM_Empenho = '$num_empenho' WHERE idFornecedor = '$id'";
        conexao($consulta);
    }
    

    function mostrar_categoria(){
        $consulta = "SELECT nomeCategoria, idCategorias FROM tb_categorias";
        $dados = conexao($consulta);
        while ($linha = $dados->fetch_assoc()) {
            echo "<tr>
                    <td>
                        <input type='checkbox' name='itensCategoria[]' value='" . htmlspecialchars($linha['idCategorias']) . "'>
                    </td>
                    <td>" . htmlspecialchars($linha['nomeCategoria']) . "</td>
                    <td>
                        <button type='submit' name='atualizarCategoria' value='" . htmlspecialchars($linha['idCategorias']) . "' class='btn-atz'>
                            <img src='../img/lapis.png' alt='Editar' class='btn-icon'>
                        </button>
                        <button type='submit' name='exibirCategoria' value='" . htmlspecialchars($linha['idCategorias']) . "' class='btn-atz'>
                            Exibir
                        </button>
                    </td>
                  </tr>";
        }
    }    
    
    function mostrar_produtos(){
        $consulta = "SELECT p.idProdutos, p.nomeProduto, p.UnidadeMedida, p.tamanho, tb_marca.nomeMarca, tb_categorias.nomeCategoria FROM tb_produtos p LEFT JOIN categoria_produto cap ON p.idProdutos = cap.produto_id LEFT JOIN marca_produto map ON p.idProdutos = map.produto_id LEFT JOIN tb_marca ON tb_marca.idMarca = map.marca_id LEFT JOIN tb_categorias ON tb_categorias.idCategorias = cap.categoria_id";
        $dados = conexao($consulta);
        while ($linha = $dados->fetch_assoc()) {
            echo "<tr>
                    <td>
                        <input type='checkbox' name='itensMarca[]' value='" . htmlspecialchars($linha['idProdutos']) . "'>
                    </td>
                    <td>" . htmlspecialchars($linha['nomeProduto']) . "</td>
                    <td>" . htmlspecialchars($linha['tamanho']) . "</td>
                    <td>" . htmlspecialchars($linha['UnidadeMedida']) . "</td>
                    <td>" . htmlspecialchars(!empty($linha['nomeCategoria']) ? $linha['nomeCategoria'] : ' ') . "</td>
                    <td>" . htmlspecialchars(!empty($linha['nomeMarca']) ? $linha['nomeMarca'] : ' ') . "</td>
                    <td>
                        <button type='submit' name='atualizarProduto' value='" . htmlspecialchars($linha['idProdutos']) . "' class='btn-atz'>
                            <img src='../img/lapis.png' alt='Editar' class='btn-icon'>
                        </button>
                    </td>
                  </tr>";
        }
    }
    

    function mostrar_marca(){
        $consulta = "SELECT nomeMarca, descricao, idMarca FROM tb_marca";
        $dados = conexao($consulta);
        while ($linha = $dados->fetch_assoc()) {
            echo "<tr>
                    <td>
                        <input type='checkbox' name='itensMarca[]' value='" . htmlspecialchars($linha['idMarca']) . "'>
                    </td>
                    <td>" . htmlspecialchars($linha['nomeMarca']) . "</td>
                    <td>" . htmlspecialchars($linha['descricao']) . "</td>
                    <td>
                        <button type='submit' name='atualizarMarca' value='" . htmlspecialchars($linha['idMarca']) . "' class='btn-atz'>
                            <img src='../img/lapis.png' alt='Editar' class='btn-icon'>
                        </button>
                        <button type='submit' name='exibirMarca' value='" . htmlspecialchars($linha['idMarca']) . "' class='btn-atz'>Exibir</button>
                    </td>
                  </tr>";
        }
    }
    
    
    function mostrar_fornecedor(){
        $consulta = "SELECT idFornecedor, nomeFornecedor, cnpj, email, telefone, endereco, num_empenho FROM tb_fornecedor";
        $dados = conexao($consulta);
        while ($linha = $dados->fetch_assoc()) {
            echo "<tr>
                    <td>
                        <input type='checkbox' name='itensFornecedor[]' value='" . htmlspecialchars($linha['idFornecedor']) . "'>
                    </td>
                    <td>" . htmlspecialchars($linha['nomeFornecedor']) . "</td>
                    <td>" . htmlspecialchars($linha['cnpj']) . "</td>
                    <td>" . htmlspecialchars($linha['email']) . "</td>
                    <td>" . htmlspecialchars($linha['telefone']) . "</td>
                    <td>" . htmlspecialchars($linha['endereco']) . "</td>
                    <td>" . htmlspecialchars($linha['num_empenho']) . "</td>
                    <td>
                        <button type='submit' name='atualizarFornecedor' value='" . htmlspecialchars($linha['idFornecedor']) . "' class='btn-atz'>
                            <img src='../img/lapis.png' alt='Editar' class='btn-icon'>
                        </button>
                    </td>
                  </tr>";
        }
    }
    function estoque(){
        $consulta = "SELECT p.idProdutos, p.nomeProduto, p.qtdEstoque, p.tamanho, p.UnidadeMedida, tb_marca.nomeMarca 
                     FROM tb_produtos p 
                     LEFT JOIN marca_produto map ON p.idProdutos = map.produto_id 
                     LEFT JOIN tb_marca ON tb_marca.idMarca = map.marca_id";
        $dados = conexao($consulta);
        while ($linha = $dados->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($linha['nomeProduto']) . "</td>
                    <td>" . htmlspecialchars($linha['qtdEstoque']) . "</td>
                    <td>" . htmlspecialchars($linha['tamanho']) . "</td>
                    <td>" . htmlspecialchars($linha['UnidadeMedida']) . "</td>
                    <td>" . htmlspecialchars(!empty($linha['nomeMarca']) ? $linha['nomeMarca'] : ' ') . "</td>
                    <td>
                        <button type='submit' name='atualizarProduto' value='" . htmlspecialchars($linha['idProdutos']) . "' class='btn-atz'>
                            <img src='../img/lapis.png' alt='Editar' class='btn-icon'>
                        </button>
                    </td>
                  </tr>";
        }
    }    
?>