<?php 

session_start();
include('conexao.php');

$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
$dataNasc = mysqli_real_escape_string($conn, $_POST['dataNasc']);
$telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$sql = "SELECT COUNT(*) AS TOTAL FROM usuario WHERE cpf = '$cpf'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
   $_SESSION['usuario_existe'] = true;
   header('Location: ../html/registrar.php');
   exit;
}

$insert = "INSERT INTO usuario(nome, cpf, email, endereco_user, dataNasc, telefone, senha) VALUES ('$nome', '$cpf', '$email', '$endereco', '$dataNasc' ,'$telefone' ,'$senha')";

if($conn->query($insert) === true) {
   $_SESSION['status_cadastro'] = true;
}
$conn->close();

header('Location: ../html/login.php');
?>