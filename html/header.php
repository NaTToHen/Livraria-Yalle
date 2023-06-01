<?php
session_start();
include('../lib/conexao.php');
?>

<header>
   <nav id="navBar">
      <a href="index.php"><img src="../img/logo.png" alt="" class="logo" width="115px" height="74px"></a>
      <form action="pesquisa.php" method="get" name="pesquisa">
         <div class="pesquisa">
            <input type="search" name="pesquisa" placeholder="Pesquisar" id="txPesquisa">
            <button type="submit" class="btnPesquisar"><a href="" class="imgPesquisa"><img src="../img/pesquisa-branco.png" alt="" width="25px"></a></button>
         </div>
      </form>
      <ul class="menuLista">
         <li id="cadastrarNav" <?php if(isset($_SESSION['usuario'])) {echo "style= 'display: none;'";}?>><a href="registrar.php">Cadastre-se</a></li>
         <li id="loginNav" <?php if(isset($_SESSION['usuario'])) {echo "style= 'display: none;'";}?>><a href="login.php">Login</a></li>
         <img class="carrinhoImg" src="../img/carrinho.png" alt="" width="50px" height="50px">
         <?php
         if(isset($_SESSION['usuario'])) {
            $logado = $_SESSION['usuario'];
            $sqlNivel = $conn->query("SELECT admin FROM usuario WHERE nome = '$logado'");
            $nivel = mysqli_fetch_array($sqlNivel);
         
            if(isset($_SESSION['usuario']) && $nivel['admin'] == 1) {
              echo 
              '<li class="dropdown">
                  <a class="userImg" href="" role="button" data-toggle="dropdown" aria-expanded="false">
                     <img src="../img/userIcon.png" width="40px" height="40px" >
                  </a>
                  <div class="dropdownMenu">
                     <a class="dropdown-item" href="../lib/usuario.php">Meu perfil</a>
                     <a class="dropdown-item" href="../html/admin.php">Administração</a>
                     <a class="dropdown-item" href="../lib/deslogar.php?token='.md5($_SESSION['usuario']).'">Sair</a>
                  </div>
               </li>';
            } else {
               echo 
              '<li class="dropdown">
                  <a class="userImg" href="" role="button" data-toggle="dropdown" aria-expanded="false">
                     <img src="../img/userIcon.png" width="40px" height="40px" >
                  </a>
                  <div class="dropdownMenu">
                     <a class="dropdown-item" href="../lib/usuario.php">Meu perfil</a>
                     <a class="dropdown-item" href="../lib/deslogar.php?token='.md5($_SESSION['usuario']).'">Sair</a>
                  </div>
               </li>';
            }
         }   ?>
      </ul>
   </nav>
</header>
   <hr>
<section id="secLinks">
   <ul id="listLinks">
      <li class="link"><a href="catalogo.php">Livros</a></li>
      <li class="link"><a href="catalogo.php">Quadrinhos</a></li>
      <li class="link"><a href="catalogo.php">Pre-Venda</a></li>
      <li class="link"><a href="catalogo.php">Assinaturas</a></li>
   </ul>
</section>