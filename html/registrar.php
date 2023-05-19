<?php
   include('../lib/conexao.php');
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
   <div class="conteudo">
      <div class="direita">
         <a href="index.php"><img src="../img/logo branca.png"></a>
      </div>
      <form class="form">
         <p class="primeiro">Nome</p>
         <input type="text" id="nome" name="nome" class="required" oninput="validacaoNome()">
            <label for="nome" class="span-validacao">Escreva um nome valido</label>
         <p>CPF</p>
         <input type="text" id="cpf" name="cpf" class="required" maxlength="14" oninput="validaCPF()">
            <label for="cpf" class="span-validacao">Digite um cpf valido</label>
         <p>Email</p>
         <input type="text" id="email" name="email" class="required"oninput="validacaoEmail()">
            <label for="email" class="span-validacao">Digite um email valido</label>
         <p>Endereço</p>
         <input type="text" id="endereco" name="endereco" class="required">
            <label for="endereco" class="span-validacao">Digite um endereço verdadeiro</label>
         <p>Data de nascimento</p>
         <input type="date" id="dataNasc" name="dataNasc">
         <p>Senha</p>
         <input type="password" id="senha" name="senha" class="required" oninput="validacaoSenha()">
            <label for="senha" class="span-validacao">A senha deve possuir 8 caracteres</label>
         <button id="registrar" type="submit">Cadastrar</button>
      </form>
   </div>

   <script src="../js/register.js"></script>
</body>
</html>