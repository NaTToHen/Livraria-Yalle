<?php
include('conexao.php');
session_start();

$livro = $_GET['livro'];
$valor = $_GET['valor'];

if(isset($_GET['comprador'])) {
   $comprador = $_GET['comprador'];

   $sqlUsuario = "SELECT id_user FROM usuario WHERE nome='$comprador'";
   $usuario = $conn->query($sqlUsuario);
   if($usuario->num_rows > 0) {
      while($info = $usuario->fetch_array()) {
         $usuarioId = $info['id_user'];
      }
      $sqlInsere = "INSERT INTO venda(fk_cliente, fk_livro, valor) VALUES ('$usuarioId','$livro', '$valor')";
      $insere = $conn->query($sqlInsere);
      if(mysqli_affected_rows($conn) > 0) {
         header("Location: ../html/index.php?venda=true");
      }
   }
   

}
?>