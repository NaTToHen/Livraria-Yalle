<?php
   include('../lib/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/login.css">
   <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
   <title>Login - Yalle</title>
</head>

<body>
   <header>
      <nav id="navBar">
         <a href="index.php"><img src="../img/logo.png" alt="" class="logo" width="115px" height="74px"></a>
      </nav>
   </header>
   <main>
      <div class="form">
         <form action="login.php" class="formLogin" method="POST">
            <p class="primeiro">Nome</p>
            <input type="text" id="email" name="usuario">
            <p>Senha</p>
            <input type="password" id="senha" name="senha">
            <br>
            <button id="logar" type="submit">Logar</button>
            <div class="linksMenu">
               <!--<a href="">Esqueceu a senha?</a>-->
            </div>
            <p class="linkCadastro">Não possui uma conta? <a href="registrar.php">Cadastre-se</a></p>
         </form>
      </div>
   </main>
</body>

</html>