<?php 
session_start();
include('conexao.php');

$token = md5($_SESSION['usuario']);

if(isset($_GET['token']) && $_GET['token'] === $token) {
   unset($_SESSION['usuario']);
   header('Location: ../html/index.php');
   exit();
}

?>