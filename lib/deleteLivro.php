<?php
   session_start();
   include("../lib/conexao.php");
  if(!empty($_GET['id']))
  {
     $id = $_GET['id'];

     $resultLivro = $conn->query("SELECT * FROM livro WHERE id_livro=$id");

     if($resultLivro->num_rows > 0) {
        while($resultLivro->fetch_array()) {
           $sqlDelete = "DELETE FROM livro WHERE id_livro=$id";
           $resultDelete = $conn->query($sqlDelete);
           header('Location: ../html/admin.php?deletado=livroTrue');
        }
     } else {
        header('Location: ../html/admin.php?deletado=livroFalse');
     }
  }
?>