<?php
include('../lib/conexao.php');
session_start();

$id = $_POST['id'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];

$insere = $conn->query("UPDATE usuario SET nome = '$nome', cpf = '$cpf', telefone = '$telefone', email = '$email', endereco_user = '$endereco' WHERE id_user=$id");

if($insere->num_rows > 0) {
   header('Location: ../html/admin.php?alterado=false');
} else {
   header('Location: ../html/admin.php?alterado=true');
}

?>