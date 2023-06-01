<?php
   session_start();
   include('conexao.php');

   if(empty($_POST['usuario']) || empty($_POST['senha'])) {
      header('location: ../html/login.php?erro=true');
      exit();
   }

   $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
   $senha = mysqli_real_escape_string($conn, $_POST['senha']);

   $query = "SELECT * FROM usuario WHERE nome = '$usuario'";
   $result = $conn->query($query);
   $row = mysqli_num_rows($result);
   $hash = $result->fetch_assoc();

   $admin = $conn->query("SELECT admin FROM usuario WHERE nome = '$usuario'");

   if($row == 1 && password_verify($senha, $hash['senha'])) {
      $_SESSION['usuario'] = $usuario;
      if($admin == 1) {
         header('Location: ../html/admin.php');
      } else {
         header('Location: ../html/index.php');
      }
      exit();
   } else {
      header('Location: ../html/login.php?erro=true');
      exit();
   }
?>