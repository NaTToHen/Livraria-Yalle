<?php
   include('../lib/conexao.php');
   include('../lib/verificaSessao.php');

   $sqlUser = "SELECT * FROM usuario ORDER BY id_user DESC";
   $sqlLivro = "SELECT * FROM livro ORDER BY id_livro DESC";

   //$sqlAutor = "SELECT autor.nome FROM autor INNER JOIN livro ON autor.id_autor = livro.fk_autor";
   //$autor = $conn->query($sqlAutor);

   $resultUser = $conn->query($sqlUser);
   $resultLivro = $conn->query($sqlLivro); 
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
         <form action="admin.html" method="POST" enctype="multipart/form-data">
           <input type="text" class="campo-form" placeholder="Nome" name="nome">
           <div class="selectDiv">
              <select class="select-form" name="autor">
                  <option value="">teste</option>
                  <option value="">teste</option>
                  <option value="">teste</option>
                  <option value="">teste</option>
              </select>
           </div>
           <div class="selectDiv">
              <select class="select-form" name="editora">
                  <option value="">teste</option>
                  <option value="">teste</option>
                  <option value="">teste</option>
                  <option value="">teste</option>
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
                        while ($row = mysqli_fetch_array($resultUser)) {
                        echo '
                        <tr class="linhaTabela">
                           <td>'.$row['id_user'].'</td>
                           <td>'.$row['nome'].'</td>
                           <td>'.$row['cpf'].'</td>
                           <td>'.$row['email'].'</td>
                           <td>'.$row['telefone'].'</td>
                           <td class="img-acao"><img src="../img/editar.png"></td>
                           <td class="img-acao"><img src="../img/deletar.png"></td>
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
                     while ($row = mysqli_fetch_array($resultLivro)) {
                        echo '
                        <tr class="linhaTabela">
                           <td>'.$row['id_livro'].'</td>
                           <td>'.$row['nome'].'</td>
                           <td>'.$row['autor'].'</td>
                           <td>'.$row['editora'].'</td>
                           <td>'.$row['preço'].'</td>
                           <td class="img-acao"><img src="../img/editar.png"></td>
                           <td class="img-acao"><img src="../img/deletar.png"></td>
                        </tr>';
                     }
                  ?>
               </tbody>
                  <tr class="linhaTabela">
                     <td><img class="img-livro" src="../img/livro.png"></td>
                     <td class="id-table">1</td>
                     <td>Rodrigo Ribeiro</td>
                     <td>Yunilyk Tuniv</td>
                     <td>Editora Nwilor</td>
                     <td>R$ 24.90</td>
                     <td class="img-acao"><img src="../img/editar.png"></td>
                     <td class="img-acao"><img src="../img/deletar.png"></td>
                  </tr>
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
               <button type="submit" name="userRelatorios" class="user">Gerar pdf</button>
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
   <script src="../js/admin.js"></script>
</body>
</html>