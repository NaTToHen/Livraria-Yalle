<?php
   include('../lib/conexao.php');
   session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/header.css">
   <link rel="stylesheet" href="../css/index.css">
   <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
   <title>Inicio - Yalle</title>
</head>
<body>

   <?php
   if (isset($_GET['logado'])) {
      if ($_GET['logado'] == 'false') {
         print_r('<div id="naoVendido">
               <h1 class="">Voce não esta logado</h1>
            </div>');
      }
   }
   if (isset($_GET['venda'])) {
      if ($_GET['venda'] == 'true') {
         print_r('<div id="vendido">
               <h1 class="">Compra efetuada com sucesso!!</h1>
            </div>');
      }
   }
   ?>

   <script src="https://www.w3schools.com/lib/w3.js"></script>
   <body>
   <div w3-include-html="header.php"></div> 
   <script>w3.includeHTML();</script>

   <main>
      <div class="slides">
      </div>
      <div id="destaques">
         <h1 class="destaqueT">Lançamentos</h1>
         <div class="container">
            <button class="flechaEsquerda control"><img src="../img/esquerda.png" alt=""></button>
            <button class="flechaDireita control"><img src="../img/direita.png" alt=""></button>
            <div class="gallery-wrapper">
               <div id="gallery">
                  <?php 
                  //$cards = $conn->query("SELECT * FROM livro ORDER BY id_livro DESC LIMIT 7");
                  $cards = $conn->query("SELECT livro.*, autor.nome_autor, editora.nome_editora FROM livro INNER JOIN autor ON livro.fk_autor = autor.id_autor INNER JOIN editora ON livro.fk_editora = editora.id_editora ORDER BY id_livro DESC LIMIT 7");
                  while ($card = mysqli_fetch_array($cards)) {
                  ?>
                  <div class="card item current-item">
                     <div class="conteudoCard">
                        <img src="<?php echo $card['pathFoto']; ?>" class="imgLivro">
                        <h2 id="nomeLivro"><?php echo $card['nome']; ?></h2>
                        <p id="autor"><?php echo $card['nome_autor']; ?></p>
                        <h1 id="preco">R$<?php echo $card['preco']; ?>.00</h1>
                        <div class="botoes">
                           <button id="btnComprar"><a href="<?php echo "livro.php?id=$card[id_livro]";?>">Comprar</a></button>
                           <button id="btnCarinhoAdd"><img src="../img/carrinho.png" alt="" width="35px" height="35px"></button>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
               </div>
            </div>
         </div>
     
     <div class="slide2">

      </div>
   </main>

   <script src="../js/index.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script>
      setTimeout(function() {
         $('#vendido').fadeOut('fast');
      }, 5000);

      setTimeout(function() {
         $('#naoVendido').fadeOut('fast');
      }, 5000);
   </script>
</body>
</html>