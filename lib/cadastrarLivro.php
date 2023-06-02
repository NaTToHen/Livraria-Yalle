<?php
include('../lib/conexao.php');

if(isset($_FILES['foto']) || isset($_POST['submit'])) {

   $nome = $_POST['nome'];
   $autor = $_POST['autor'];
   $editora = $_POST['editora'];
   $sinopse = $_POST['sinopse'];
   $preco = $_POST['preco'];
   $foto = $_FILES['foto'];

   if($foto['size'] > 5000000) {
      header('Location: ../html/admin.php?erroLivro=true');
      die();
   }
   $pasta = '../img/livros/';
   $nomeArquivo = $foto['name'];
   $nomeArquivoBanco = uniqid();
   $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));//jpg, png
   
   if($extensao == 'jpg' || $extensao == 'png' || $extensao == 'jpeg') {
      $path = $pasta.$nomeArquivoBanco.".".$extensao;
      $deuCerto = move_uploaded_file($foto['tmp_name'], $path);

      if($deuCerto) {
         $insere = "INSERT INTO livro(nome, fk_autor, sinopse, fk_editora, preco, nomeFoto, pathFoto, fk_fornecedora) VALUES('$nome', '$autor', '$sinopse', '$editora', '$preco', '$nomeArquivo', '$path', 1)";
         $query = $conn->query($insere);

         if(mysqli_affected_rows($conn) > 0) {
            header('Location: ../html/admin.php?livroCadastrado=true'); 
         } else {
            header('Location: ../html/admin.php?erroLivro=true');
         }
      } else {
         header('Location: ../html/admin.php?erroLivro=true');
      }
   } else {
      header('Location: ../html/admin.php?erroLivro=true');
   }
   
} else {
   header('Location: ../html/admin.php?erroLivro=true');
}
?>