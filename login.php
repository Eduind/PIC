<?php
include('funcoes.php');
if (isset($_POST['btn'])){
    if(isset($_POST['email']) && isset($_POST['senha'])){ 

        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $consulta = "SELECT email, senha FROM tb_usuarios WHERE email = '$email' AND senha = '$senha'";
        $resultado = conexao($consulta);

        if($resultado -> num_rows == 1){
            $_SESSION['login'] = true;
            header('Location:nutricionista/registrar_itens.php');
            exit();
            
        } else{
            echo "<script>alert('Email ou Senha invalido')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Nosso Refeitório</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="container">
        <div class="esquerda">
            <img src="img/logo.png" alt="Logo Nosso Refeitório" class="logo">
            
            <h1>Faça login</h1>
            
            <form action="" method="post" enctype="multipart/form-data">
                
                <input type="email" id="email" name="email"  placeholder="E-mail" required>
                
                <input type="password" id="senha" name="senha" placeholder="Senha"required>
                
                <button type="submit" name="btn">Entrar</button>
            </form>
        </div>
        <div class="direita">
            <img src="img/img.png" alt="Imagem Ilustrativa Nosso Refeitório">
        </div> 
    </div>
</body>
</html>