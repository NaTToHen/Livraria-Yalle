<?php
header('Content-Type: application/json');
include('../lib/conexao.php');
session_start();

if(isset($_GET['id'])) {

    $id = $_GET['id'];
    $sqlUser = "SELECT * FROM usuario WHERE id_user=$id";
    $resultado = $conn->query($sqlUser);

    if($resultado->num_rows > 0) {
        while ($row = mysqli_fetch_array($resultado)) {
            $nome = $row['nome'];
            $email = $row['email'];
            $cpf = $row['cpf'];
            $telefone = $row['telefone'];
            $endereco = $row['endereco_user'];
        }
         $data = array(
            'id' => $id,
            'nome' => $nome,
            'email' => $email,
            'cpf' => $cpf,
            'telefone' => $telefone,
            'endereco' => $endereco
         );
         echo json_encode($data);
    }
}
?>