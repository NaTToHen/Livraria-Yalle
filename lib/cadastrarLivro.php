<?php
include('../lib/conexao.php');

if(isset($_FILES['foto']) && isset($_POST['submit'])) {

   $nome = $_POST['nome'];
   $autor = $_POST['autor'];
   $editora = $_POST['editora'];
   $sinopse = $_POST['sinopse'];
   $preco = $_POST['preco'];
   $foto = $_FILES['foto'];

   if($foto['size'] > 5000000) {
      header('Location: ../html/admin.php?erro=true');
      die();
   }
   $pasta = '../img/livros/';
   $nomeArquivo = $foto['name'];
   $nomeArquivoBanco = uniqid();
   $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));//jpg, png
   
   $path = $pasta.$nomeArquivoBanco.".".$extensao;
   $deuCerto = move_uploaded_file($foto['tmp_name'], $path);
   if($deuCerto) {
      $conn->query("INSERT INTO livro(nome, fk_autor, sinopse, fk_editora, preco, nomeFoto, pathFoto, fk_fornecedora) VALUES('$nome', '$autor', '$sinopse', '$editora', '$preco', '$nomeArquivo', '$path', 1)");
      header('Location: ../html/admin.php?deuCerto');
   }
} else {
   header('../html/admin.php?erro=true');
}
?>