<?php
include('../lib/conexao.php');
session_start();

$id = $_POST['id'];
$nome = $_POST['nome'];
$sinopse = $_POST['sinopse'];
$preco = $_POST['preco'];

$insere = $conn->query("UPDATE livro SET nome = '$nome', sinopse = '$sinopse', preco = '$preco' WHERE id_livro=$id");

if($insere->num_rows > 0) {
   header('Location: ../html/admin.php?alteradoLivro=false');
} else {
   header('Location: ../html/admin.php?alteradoLivro=true');
}

?>