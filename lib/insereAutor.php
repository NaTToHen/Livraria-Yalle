<?php
header('Content-Type: application/json');
$name = $_POST['name'];

$pdo = new PDO('mysql:host=localhost; dbname=yalledb;', 'root', '');

$stmt = $pdo->prepare('INSERT INTO autor(nome_autor) VALUES (:nome)');
$stmt->bindValue(':nome', $name);
$stmt->execute();

   if($stmt->rowCount()) {
      echo json_encode('autor inserido');
   } else {
      echo json_encode('autor nao inserido');
   }
?>