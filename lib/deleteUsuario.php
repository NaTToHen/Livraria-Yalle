<?php
   session_start();
   include("../lib/conexao.php");
  if(!empty($_GET['id']))
  {
     $id = $_GET['id'];

     $sqlUser = "SELECT * FROM usuario WHERE id_user=$id";
     $resultUser = $conn->query($sqlUser);

     if($resultUser->num_rows > 0) {
        while($resultUser->fetch_array()) {
           $sqlDelete = "DELETE FROM usuario WHERE id_user=$id";
           $resultDelete = $conn->query($sqlDelete);
           header('Location: ../html/admin.php?deletado=userTrue');
        }
     } else {
        header('Location: ../html/admin.php?deletado=userFalse');
     }
  }
?>