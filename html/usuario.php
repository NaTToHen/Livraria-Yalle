<?php
   session_start();
   include("../lib/conexao.php");

   $logado = $_SESSION['usuario'];
   $sqlUsuario = "SELECT * FROM usuario WHERE nome='$logado'";
   $usuario = $conn->query($sqlUsuario);

   while ($info = $usuario->fetch_array()) {
      $usuarioId = $info['id_user'];
      $nomeUser = $info['nome'];
      $emailUser = $info['email'];
      $telefoneUser = $info['telefone'];
      $enderecoUser = $info['endereco_user'];
      $cpfUser = $info['cpf'];
   }
      $sqlVenda = "SELECT venda.*, livro.* FROM venda INNER JOIN livro ON venda.fk_livro = livro.id_livro INNER JOIN usuario ON venda.fk_cliente = usuario.id_user WHERE fk_cliente=usuario.id_user AND id_user=$usuarioId";
      $venda = $conn->query($sqlVenda);
      $valorTotal = 0;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/header.css">
   <link rel="stylesheet" href="../css/usuario.css">
   <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
   <title>Inicio - Yalle</title>
</head>

<body>

   <script src="https://www.w3schools.com/lib/w3.js"></script>

   <body>
      <div w3-include-html="header.php"></div>
      <script>
         w3.includeHTML();
      </script>

      <main>
         <div id="infoUsuario">
            <h1 class="infoTitulo">Informações pessoais</h1>
            <label class="" for="nome">Nome: </label>
               <input type="text" disabled="" value="<?php echo $nomeUser ?>" name="nome">
            <label class="" for="cpf">Cpf: </label>
               <input type="text" disabled="" value="<?php echo $cpfUser ?>" name="cpf">
            <label class="" for="email">Email: </label>
               <input type="text" disabled="" value="<?php echo $emailUser ?>" name="email">
            <label class="" for="telefone">Telefone: </label>
               <input type="text" disabled="" value="<?php echo $telefoneUser ?>" name="telefone">
            <label class="" for="endereco">Endereço: </label>
               <input type="text" disabled="" value="<?php echo $enderecoUser ?>" name="endereco">
         </div>
         <h1 class="infoCompra">Minhas compras</h1>
         <div class="compras">
            <?php 
               while ($item = mysqli_fetch_array($venda)) {
               $valorTotal = $valorTotal+ $item['valor'];
            ?>
            <div class="compra">
               <p class="codVenda">COD: 0<?php echo $item['id_venda']; ?></p>
               <img src="<?php echo $item['pathFoto']; ?>" alt="" width="50px">
               <h1 class="nomeLivro"><?php echo $item['nome'] ?></h1>
               <p class="codLivro">COD. Livro: 0<?php echo $item['id_livro']; ?></p>
               <h1 id="precoLivro">R$ <?php echo $item['valor']; ?>.00</h1>
            </div>
            <?php } ?>
            <hr>
            <h1 class="valorTotal">Valor total:  R$ <?php echo $valorTotal ?>,00</h1>
         </div>
      </main>

      <script src="../js/usuario.js"></script>
   </body>

</html>