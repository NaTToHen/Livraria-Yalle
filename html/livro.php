<?php
   include('../lib/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/header.css">
   <link rel="stylesheet" href="../css/livro.css">
   <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
   <title>Inicio - Yalle</title>
</head>
<body>

   <script src="https://www.w3schools.com/lib/w3.js"></script>
   <body>
   <div w3-include-html="header.html"></div> 
   <script>w3.includeHTML();</script>

   <main>
      <div id="fotoLivro">
         <img src="../img/livro.png" alt="" width="300px">
      </div>
      <div id="infoLivro">
         <h1 class="nomeLivro">Os Irmãos</h1>
         <h2 class="autorLivro">dostoievski, fiodor</h2>
            <p class="editoraLivro">Editora: Mariin Claret</p>
            <p class="paginasLivro">120 paginas</p>
            <p class="capaLivro">capa dura</p>
         <p class="codigoLivro">Cod: 001</p>
         <h1 id="precoLivro">R$ 35,99</h1>
         <img src="../img/carrinho.png" alt="">
         <button type="submit" class="btnComprar">Comprar</button>
      </div>
   </main>

   <section class="infosLivro">
      <h1>Sinópse</h1>
      <p>       "Os irmãos Karamázov" é o último romance de Dostoiévski. No fundo, ele resume toda a criatividade do escritor, trazendo à baila as "malditas" questões existenciais que o afligiram a vida inteira, com especial relevo para a flagrante degradação moral da humanidade afastada dos ideais cristãos. Cheia de peripécias, a narrativa põe em foco três protagonistas irmãos, representantes dos mais diversos aspectos da realidade russa – o libertino Dmítri, o niilista Ivan e o sublime Aliocha –, a fim de alumiar as profundezas insondáveis do coração entregue ao pecado, corrompido por dúvidas ou transbordante de amor.
      </p>

      <h1 class="detalhesTitulo">Detalhes</h1>
      <div class="divDetalhes">
         
      </div>

   </section>

   <script src="../js/livro.js"></script>
</body>
</html>