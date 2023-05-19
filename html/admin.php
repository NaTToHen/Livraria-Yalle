<?php
   include('../lib/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/admin.css">
   <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
   <title>Admin-dashboard</title>
</head>
<body>
   <header>
      <nav id="menuSuperior">
         <a href="index.php"><img src="../img/logoAdmin.png" alt="" class="logo"></a>
         <h1>DASHBOARD ADMINISTRADOR</h1>
         <ul class="menuLista">
            <li id="cadastrarNav"><a href="">Sair</a></li>
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

      <div id="modal">
         <button type="submit" class="btnSair" onclick="fecharModal()" name="sair" id="fechar">X</button>
         <form action="admin.html" method="POST">
           <input type="text" class="campo-form" id="" placeholder="Nome" name="nome">
           <input type="text" class="campo-form" id="" placeholder="Autor" name="autor">
           <input type="text" class="campo-form" id="" placeholder="Editora" name="editora">
           <textarea class="campo-form" id="sinopse" name="sinopse" placeholder="sinopse"></textarea>
           <input type="text" class="campo-form" id="preco" placeholder="Preço" name="preco">
           <input type="file" id="foto" name="foto" accept="image/png, image/jpeg">
           
           <button type="submit" class="criar" name="submit">Criar Livro</button>
           <button type="button" class="cancelar" onclick="fecharModal()" name="sair" id="fechar">Cancelar</button>
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
                     <th>telefone</th>
                     <th>Editar</th>
                     <th>Excluir</th>
                 </tr>
               </thead>
                  <tr class="linhaTabela">
                     <td>1</td>
                     <td>Ronaldo Robero</td>
                     <td>999.999.999-23</td>
                     <td>(54) 99999-9999</td>
                     <td><img src="../img/editar.png"></td>
                     <td><img src="../img/deletar.png"></td>
                  </tr>
           </table>
         </section>
         <section id="livros">
            <div class="add-livro" onclick="abrirModal()" >Criar livro</div>
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
      </main>
   </main>

   <script src="../js/admin.js"></script>
</body>
</html>