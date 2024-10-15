<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "referencias.php" ?>
</head>
<body>
    <?php include "header_admin.php"?>
    <?php
    // 1 passo inclusao das funcoes de a cesso  dados
    include "conexao_bd.php";
    // 2 passo capturar o login e senha 
     $login_usuario = $_POST["txtLoginUsuario"];
     $senha_usuario = $_POST["txtSenhaUsuario"];

     $hash = password_hash($senha_usuario,1);

     // 3 passo executar o comando sql
     $sql = "INSERT INTO usuario(login_usuario,senha_usuario) ";
    $sql .= "VALUES('$login_usuario','$hash') ";

    /// 4 Passo executar no BDA
     if(executarComando($sql))
     {
        
        echo "<h1> Usuário adicionado! </h1>";
     }
     else
     {
        echo "<h1> Usuário não cadastrado! </h1>";
        
     }




     ?>

</body>
</html>