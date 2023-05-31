<?php
   include('../lib/conexao.php');
   include('../lib/verificaSessao.php');

   $sqlEstoque = "SELECT * FROM estoque ORDER BY id_estoque DESC";
   $resultEstoque = $conn->query($sqlEstoque);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/admin.css">
   <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
   <title><?php echo $_SESSION['usuario'] ?> - dashboard</title>
</head>
<body>
   <header>
      <nav id="menuSuperior">
         <a href="index.php"><img src="../img/logoAdmin.png" alt="" class="logo"></a>
         <h1>DASHBOARD - <?php echo $_SESSION['usuario'] ?></h1>
         <ul class="menuLista">
            <li id="cadastrarNav">
               <?php
                  echo '<a href="../lib/deslogar.php?token='.md5($_SESSION['usuario']).'">Sair</a>' 
               ?>
            </li>
         </ul>
      </nav>
   </header>
   <?php

   if (isset($_GET['livroCadastrado'])) {
      if ($_GET['livroCadastrado'] == 'true') {
         print_r('<div id="cadastrado">
               <h1 class="">Livro cadastrado com sucesso</h1>
            </div>');
      }
   }
   if (isset($_GET['erroLivro'])) {
      if ($_GET['erroLivro'] == 'true') {
         print_r('<div id="naoCadastrado">
               <h1 class="">O livro não foi cadastrado</h1>
            </div>');
      }
   }
   if (isset($_GET['deletado'])) {
      if ($_GET['deletado'] == 'userFalse') {
         print_r('<div id="naoCadastrado">
               <h1 class="">Erro ao deletar Usuario</h1>
            </div>');
      }
   }
   if (isset($_GET['deletado'])) {
      if ($_GET['deletado'] == 'userTrue') {
         print_r('<div id="cadastrado">
               <h1 class="">Usuario deletado com sucesso</h1>
            </div>');
      }
   }
   if (isset($_GET['deletado'])) {
      if ($_GET['deletado'] == 'livroFalse') {
         print_r('<div id="naoCadastrado">
               <h1 class="">Erro ao deletar livro</h1>
            </div>');
      }
   }
   if (isset($_GET['deletado'])) {
      if ($_GET['deletado'] == 'livroTrue') {
         print_r('<div id="cadastrado">
               <h1 class="">Livro deletado com sucesso</h1>
            </div>');
      }
   }
   ?>

   <div id="fundoModal"></div>
   <main id="menu-conteudo">
      <nav id="menuLateral">
         <ul class="listaMenu">
            <li class="itemMenu">Usuarios</li>
            <li class="itemMenu">Livros</li>
            <li class="itemMenu">Estoque</li>
            <li class="itemMenu">Fornecedoras</li>
            <li class="itemMenu">Relatórios</li>
         </ul>
      </nav>

      <div id="modalLivro">
         <button type="submit" class="btnSair" onclick="fecharModalLivro()" name="sair" id="fechar">X</button>
         <form action="../lib/cadastrarLivro.php" method="POST" enctype="multipart/form-data">
           <input type="text" class="campo-form" placeholder="Nome" name="nome">
           <div class="selectDiv">
              <select class="select-form" name="autor">
              <option value="" disabled selected>Selecio o autor</option>
               <?php 
                  $sqlAutor = "SELECT id_autor, nome_autor FROM autor ORDER BY id_autor DESC";
                  $resultAutor = $conn->query($sqlAutor);
                  while($autor = mysqli_fetch_array($resultAutor)) {
                  ?>
                  <option value="<?php echo $autor['id_autor'] ?>"><?php echo $autor['nome_autor'] ?></option>
                  <?php } ?>
              </select>
           </div>
           <div class="selectDiv">
              <select class="select-form" name="editora">
              <option value="" disabled selected>Selecio a editora</option>
              <?php 
                  $sqlEditora = "SELECT * FROM editora ORDER BY id_editora DESC";
                  $resultEditora = $conn->query($sqlEditora);
                  while($Editora = mysqli_fetch_array($resultEditora)) {
                  ?>
                  <option value="<?php echo $Editora['id_editora'] ?>"><?php echo $Editora['nome_editora'] ?></option>
                  <?php } ?>
              </select>
           </div>
           <textarea class="campo-form" id="sinopse" name="sinopse" placeholder="sinopse"></textarea>
           <input type="text" class="campo-form" id="preco" placeholder="Preço" name="preco">
           <input type="file" id="foto" name="foto" accept="image/png, image/jpeg">
           
           <button type="submit" class="criar" name="submit">Criar Livro</button>
           <button type="button" class="cancelar" onclick="fecharModalLivro()" name="sair" id="fechar">Cancelar</button>
         </form>
       </div>

      <main id="conteudo">
         
         <section id="usuarios">
            <table>
               <thead>
                  <tr>
                     <th>id</th>
                     <th>nome</th>
                     <th>cpf</th>
                     <th>email</th>
                     <th>telefone</th>
                     <th>Editar</th>
                     <th>Excluir</th>
                 </tr>
               </thead>
                  <tbody>
                     <?php
                     $sqlUser = "SELECT * FROM usuario ORDER BY id_user DESC";
                     $resultUser = $conn->query($sqlUser);
                        while($row = mysqli_fetch_array($resultUser)) {
                        echo '
                        <tr class="linhaTabela">
                           <td>'.$row['id_user'].'</td>
                           <td>'.$row['nome'].'</td>
                           <td>'.$row['cpf'].'</td>
                           <td>'.$row['email'].'</td>
                           <td>'.$row['telefone'].'</td>
                           <td class="img-acao"><img src="../img/editar.png"></td>
                           <td class="img-acao"><a href="../lib/deleteUsuario.php?id='.$row['id_user'].'"><img src="../img/deletar.png"></a></td>
                        </tr>';
                        }
                     ?>
                  </tbody>
           </table>
         </section>

         <section id="livros">
            <div class="adds">
               <p class="add-link" onclick="abrirModalLivro()" >Criar livro</p>
               <p class="add-link" onclick="abrirFecharAddAutor()" >Criar autor</p>
               <div class="criarAutor">
                  <form method="post" action="" id="formAutor">
                     <input type="text" class="inputCriar" placeholder="Nome do autor" name="autorNome" id="autorNome">
                     <button type="submit" class="btnCriar" form="formAutor">Criar</button>
                  </form>
               </div>
               <p class="add-link" onclick="abrirFecharAddEditora()" >Criar editora</p>
               <div class="criarEditora">
                  <form method="post" action="" id="formEditora">
                     <input type="text" class="inputCriar" placeholder="Nome da editora" name="editoraNome" id="editoraNome">
                     <button type="submit" class="btnCriar" form="formEditora">Criar</button>
                  </form>
               </div>
            </div>
            <table>
               <thead>
                  <tr>
                     <th>Foto</th>
                     <th>Id</th>
                     <th>Nome</th>
                     <th>Autor</th>
                     <th>Editora</th>
                     <th>Preço</th>
                     <th>Editar</th>
                     <th>Excluir</th>
                 </tr>
               </thead>
               <tbody>
                  <?php
                  //$sqlLivro = "SELECT * FROM livro ORDER BY id_livro DESC";
                  $sqlLivro = "SELECT livro.*, autor.nome_autor, editora.nome_editora FROM livro INNER JOIN autor ON livro.fk_autor = autor.id_autor INNER JOIN editora ON livro.fk_editora = editora.id_editora";

                  $resultLivro = $conn->query($sqlLivro);
                     while ($row = mysqli_fetch_array($resultLivro)) {
                        echo '
                        <tr class="linhaTabela">
                           <td><img class="img-livro" src="'.$row['pathFoto'].'"></td>
                           <td>'.$row['id_livro'].'</td>
                           <td>'.$row['nome'].'</td>
                           <td>'.$row['nome_autor'].'</td>
                           <td>'.$row['nome_editora'].'</td>
                           <td>R$ '.$row['preco'].'.00</td>
                           <td class="img-acao"><a href="../lib/editarLivro.php"><img src="../img/editar.png"></a></td>
                           <td class="img-acao"><a href="../lib/deleteLivro.php?id='.$row['id_livro'].'"><img src="../img/deletar.png"></a></td>
                        </tr>';
                     }
                  ?>
               </tbody>
           </table>
         </section>

         <section id="estoque">
            estoqie
         </section>

         <section id="fornecedoras">

         </section>

         <section id="relatorios">
            <div class="relatorioDiv">
               <p class="">Relatório de usuários</p>
               <a href="../relatorios/geradorPdfUsuarios.php" target="_blank"><button type="submit" name="userRelatorios" class="user">Gerar pdf</button></a>
            </div>

            <div class="relatorioDiv">
               <p class="">Relatório de livros cadastrados</p>
               <a href="../relatorios/geradorPdfLivros.php" target="_blank"><button type="submit" name="userRelatorios" class="user">Gerar pdf</button></a>
            </div>

            <div class="relatorioDiv">
               <p class="">Relatório de produtos cadastrados</p>
               <button type="submit" name="userRelatorios" class="user">Gerar pdf</button>
            </div>

            <div class="relatorioDiv">
               <p class="">Relatório de autores cadastrados</p>
               <button type="submit" name="userRelatorios" class="user">Gerar pdf</button>
            </div>

            <div class="relatorioDiv">
               <p class="">Relatório de vendas</p>
               <button type="submit" name="userRelatorios" class="user">Gerar pdf</button>
            </div>
         </section>
      </main>
   </main>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script>
      setTimeout(function() {
         $('#cadastrado').fadeOut('fast');
      }, 5000);

      setTimeout(function() {
         $('#naoCadastrado').fadeOut('fast');
      }, 5000);
   </script>
   <script src="../js/admin.js"></script>
</body>
</html>