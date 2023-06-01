<?php
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
    } else {
        header('Location: ../html/admin.php?editar=naoEncontrado');
    }
} else {
        header('Location: ../html/admin.php?editar=naoEncontrado');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/registrar.css">
   <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
   <title>Cadastro - Yalle</title>
</head>
<body>
   <div class="conteudoEditar">
      <form class="form" method="POST" action="../lib/validacaoCadastro.php">
         <p class="primeiro">Nome</p>
         <input type="text" id="nome" name="nome" class="required" oninput="validacaoNome()" value="<?php echo $nome ?>">
            <label for="nome" class="span-validacao">Escreva um nome valido</label>
         <p>CPF</p>
         <input type="text" id="cpf" name="cpf" class="required" maxlength="14" oninput="validaCPF()" value="<?php echo $cpf ?>">
            <label for="cpf" class="span-validacao">Digite um cpf valido</label>
         <p>Email</p>
         <input type="text" id="email" name="email" class="required" oninput="validacaoEmail()" value="<?php echo $email ?>">
            <label for="email" class="span-validacao">Digite um email valido</label>
         <p>Endereço</p>
         <input type="text" id="endereco" name="endereco" class="required" value="<?php echo $endereco ?>">
            <label for="endereco" class="span-validacao">Digite um endereço verdadeiro</label>
         <div class="labels">
            <p>Telefone</p>
         </div>
            <input type="text" id="telefone" name="telefone" class="required" value="<?php echo $telefone ?>">
            <!--<div class="jaCadastrado">
               <p class="cadastrado">cpf ja cadastrado</p>
            </div>-->
         <button id="registrar" type="submit" name="submit">Editar</button>
      </form>
   </div>

   <script src="../js/register.js"></script>
</body>
</html>
  