<?php
session_start();
include('../lib/conexao.php');

if (!isset($_GET['pesquisa'])) {
   header("Location: index.php");
}
$pesquisado = $_GET['pesquisa'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/header.css">
   <link rel="stylesheet" href="../css/catalogo.css">
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
         <div id="destaques">
            <div class="fundoT">
               <h1 class="destaqueTCatalogo"><?php echo $pesquisado; ?></h1>
            </div>
            <br>
            <br>
            <div id="cards">
               <?php
               //$cards = $conn->query("SELECT * FROM livro ORDER BY id_livro DESC LIMIT 7");
               $cards = $conn->query("SELECT livro.*, autor.nome_autor, editora.nome_editora FROM livro INNER JOIN autor ON livro.fk_autor = autor.id_autor INNER JOIN editora ON livro.fk_editora = editora.id_editora WHERE livro.nome LIKE '%$pesquisado%'");
               while ($card = mysqli_fetch_array($cards)) {
               ?>
                  <div class="card item current-item">
                     <div class="conteudoCard">
                        <img src="<?php echo $card['pathFoto']; ?>" class="imgLivro">
                        <h2 id="nomeLivro"><?php echo $card['nome']; ?></h2>
                        <p id="autor"><?php echo $card['nome_autor']; ?></p>
                        <h1 id="preco">R$ <?php echo $card['preco']; ?>.00</h1>
                        <div class="botoes">
                           <button id="btnComprar" type="submit"><a href="<?php echo "livro.php?id=$card[id_livro]"; ?>">Comprar</a></button>
                           <button id="btnCarinhoAdd"><img src="../img/carrinho.png" alt="" width="35px" height="35px"></button>
                        </div>
                     </div>
                  </div>
               <?php
               }
               ?>

            </div>
         </div>
      </main>
   </body>

</html>