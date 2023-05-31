<?php
   if(!empty($_GET['id']))
   {
      session_start();
      include("../lib/conexao.php");

      $id = $_GET['id'];

      $livro = $conn->query("SELECT livro.*, autor.nome_autor, editora.nome_editora FROM livro INNER JOIN autor ON livro.fk_autor = autor.id_autor INNER JOIN editora ON livro.fk_editora = editora.id_editora WHERE id_livro=$id");

      if($livro->num_rows > 0) {
         while($info = $livro->fetch_array()) {
            $path = $info['pathFoto'];
            $nome = $info['nome'];
            $autor = $info['nome_autor'];
            $sinopse = $info['sinopse'];
            $preco = $info['preco'];
            $editora = $info['nome_editora'];
            $idLivro = $info['id_livro'];
         }
      } else {
        echo "erro";
      }
    }
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
   <div w3-include-html="header.php"></div> 
   <script>w3.includeHTML();</script>

   <main>
      <div id="fotoLivro">
         <img src="<?php echo $path; ?>" alt="" width="300px">
      </div>
      <div id="infoLivro">
         <h1 class="nomeLivro"><?php echo $nome; ?></h1>
         <h2 class="autorLivro"><?php echo $autor; ?></h2>
            <p class="editoraLivro"><?php echo $editora; ?></p>
            <p class="paginasLivro">120 paginas</p>
            <p class="capaLivro">capa dura</p>
         <p class="codigoLivro">COD: 0<?php echo $id; ?></p>
         <h1 id="precoLivro">R$ <?php echo $preco; ?>.00</h1>
         <img src="../img/carrinho.png" alt="">
         <button type="submit" class="btnComprar">Comprar</button>
      </div>
   </main>

   <section class="infosLivro">
      <h1>Sinópse</h1>
      <p><?php echo $sinopse; ?></p>

      <h1 class="detalhesTitulo">Detalhes</h1>
      <div class="divDetalhes">
         
      </div>

   </section>

   <script src="../js/livro.js"></script>
</body>
</html>