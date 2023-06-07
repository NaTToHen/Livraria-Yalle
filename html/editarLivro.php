<?php
header('Content-Type: application/json');
include('../lib/conexao.php');
session_start();

if(isset($_GET['id'])) {

    $id = $_GET['id'];
    $sqlLivro = "SELECT * FROM livro WHERE id_livro=$id";
    $resultado = $conn->query($sqlLivro);

    if($resultado->num_rows > 0) {
        while ($row = mysqli_fetch_array($resultado)) {
            $nome = $row['nome'];
            $sinopse = $row['sinopse'];
            $preco = $row['preco'];
        }
        $data = array(
            'id' => $id,
            'nome' => $nome,
            'sinopse' => $sinopse,
            'preco' => $preco
        );
         echo json_encode($data);
    }
}
?>