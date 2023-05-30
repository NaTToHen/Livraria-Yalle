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
                  <div class="card item current-item">
                     <div class="conteudoCard">
                        <img src="../img/livro.png" alt="">
                        <h2 id="nomeLivro">teste</h2>
                        <p id="autor">autor</p>
                        <h1 id="preco">R$ 35,99</h1>
                        <div class="botoes">
                           <button id="btnComprar">Comprar</button>
                           <button id="btnCarinhoAdd"><img src="../img/carrinho.png" alt="" width="35px" height="35px"></button>
                        </div>
                     </div>
                  </div>
                  <div class="card item">
                     <div class="conteudoCard">
                        <img src="../img/livro.png" alt="">
                        <h2 id="nomeLivro">teste</h2>
                        <p id="autor">autor</p>
                        <h1 id="preco">R$ 35,99</h1>
                        <div class="botoes">
                           <button id="btnComprar">Comprar</button>
                           <button id="btnCarinhoAdd"><img src="../img/carrinho.png" alt="" width="35px" height="35px"></button>
                        </div>
                     </div>
                  </div>
                  <div class="card item">
                     <div class="conteudoCard">
                        <img src="../img/livro.png" alt="">
                        <h2 id="nomeLivro">teste</h2>
                        <p id="autor">autor</p>
                        <h1 id="preco">R$ 35,99</h1>
                        <div class="botoes">
                           <button id="btnComprar">Comprar</button>
                           <button id="btnCarinhoAdd"><img src="../img/carrinho.png" alt="" width="35px" height="35px"></button>
                        </div>
                     </div>
                  </div>
                  <div class="card item">
                     <div class="conteudoCard">
                        <img src="../img/livro.png" alt="">
                        <h2 id="nomeLivro">teste</h2>
                        <p id="autor">autor</p>
                        <h1 id="preco">R$ 35,99</h1>
                        <div class="botoes">
                           <button id="btnComprar">Comprar</button>
                           <button id="btnCarinhoAdd"><img src="../img/carrinho.png" alt="" width="35px" height="35px"></button>
                        </div>
                     </div>
                  </div>
                  <div class="card item">
                     <div class="conteudoCard">
                        <img src="../img/livro.png" alt="">
                        <h2 id="nomeLivro">teste</h2>
                        <p id="autor">autor</p>
                        <h1 id="preco">R$ 35,99</h1>
                        <div class="botoes">
                           <button id="btnComprar">Comprar</button>
                           <button id="btnCarinhoAdd"><img src="../img/carrinho.png" alt="" width="35px" height="35px"></button>
                        </div>
                     </div>
                  </div>
                  <div class="card item">
                     <div class="conteudoCard">
                        <img src="../img/livro.png" alt="">
                        <h2 id="nomeLivro">teste</h2>
                        <p id="autor">autor</p>
                        <h1 id="preco">R$ 35,99</h1>
                        <div class="botoes">
                           <button id="btnComprar">Comprar</button>
                           <button id="btnCarinhoAdd"><img src="../img/carrinho.png" alt="" width="35px" height="35px"></button>
                        </div>
                     </div>
                  </div>
                  <div class="card item">
                     <div class="conteudoCard">
                        <img src="../img/livro.png" alt="">
                        <h2 id="nomeLivro">teste</h2>
                        <p id="autor">autor</p>
                        <h1 id="preco">R$ 35,99</h1>
                        <div class="botoes">
                           <button id="btnComprar">Comprar</button>
                           <button id="btnCarinhoAdd"><img src="../img/carrinho.png" alt="" width="35px" height="35px"></button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
     
     <div class="slide2">

      </div>
   </main>

   <script src="../js/index.js"></script>

</body>
</html>