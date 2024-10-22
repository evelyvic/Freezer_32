<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <?php include "referencias.php"?>
    <title>Document</title>
</head>
<body>
   <?php include "header.php"?>

   <?php

        //1ºpasso incluir a conexao de dados
        include "conexao_bd.php";
        //2passo capturar o login e a senha
        $login = $_POST["txtLoginUsuario"];
        $senha = $_POST["txtSenhaUsuario"];
        //3 passo verificar se existe o usuario indicado
        $sql = "SELECT * FROM usuario  WHERE login_usuario = '$login'";
        // 4 passo executar a operacao no BDA
        $dados = retornarDados($sql);

        if($dados == 0)
        {
            echo "<h1> O usuário informado não existe</h1>";
            echo "<a href='login.php'>Voltar</a>";
        }
        else
        {
            $linha = mysqli_fetch_assoc($dados);
            $hash = $linha["senha_usuario"];
            
            $retorno = password_verify($senha,$hash);
            
        if($retorno)    
           { 
            
            session_start();
            $_SESSION["login"] = $login;
            header("location:index_admin.php");

            }
            else{

                echo "<h1> A senha informada esta errada</h1>";
                echo "<a href ='login.php'> Voltar </a>";

            } 
        }

   ?>

   <?php include "footer.php"?>
</body>
</html>