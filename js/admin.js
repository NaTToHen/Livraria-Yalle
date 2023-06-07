const modal = document.querySelector('#modalLivro');
const modalUser = document.querySelector('#modalEditarUser');
const modalEditarLivro = document.querySelector('#modalEditarLivro');

const fundomodal = document.querySelector('#fundoModal');

const criarAutor = document.querySelector('.criarAutor');
const criarEditora = document.querySelector('.criarEditora');

//autor
function abrirFecharAddAutor() {
   if(criarAutor.style.display == 'none') {
      criarAutor.style.display = 'block';
   } else {
      criarAutor.style.display = 'none';
   }
}
//editora
function abrirFecharAddEditora() {
   if(criarEditora.style.display == 'none') {
      criarEditora.style.display = 'block';
   } else {
      criarEditora.style.display = 'none';
   }
}
//modal do add livro
function abrirModalLivro() {
   modal.style.display = 'block';
   fundomodal.style.display = 'block';
}
function fecharModalLivro() {
   modal.style.display = 'none';
   fundomodal.style.display = 'none';
}

//carrega dados do editar usuario
function loadData(id) {
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
     if (this.readyState == 4 && this.status == 200) {
       var data = JSON.parse(this.responseText);
       console.log(this.responseText);
       document.querySelector("#idUser").value = data.id;
       document.querySelector("#nomeUser").value = data.nome;
       document.querySelector("#emailUser").value = data.email;
       document.querySelector("#cpfUser").value = data.cpf;
       document.querySelector("#telefoneUser").value = data.telefone;
       document.querySelector("#enderecoUser").value = data.endereco;
     }
   };
   xhttp.open("GET", "editarUsuario.php?id="+id, true);//executa o arquivo
   xhttp.send();//envia os dados?
}




function abrirModalEditarLivro(id) {
   modalEditarLivro.style.display = 'block';
   fundomodal.style.display = 'block';
   loadDataLivro(id);
}
function fecharModalEditarLivro() {
   modalEditarLivro.style.display = 'none';
   fundomodal.style.display = 'none';
}

function loadDataLivro(id) {
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
     if (this.readyState == 4 && this.status == 200) {
       var data = JSON.parse(this.responseText);
       console.log(this.responseText);
       document.querySelector("#idLivro").value = data.id;
       document.getElementById("nomeLivro").value = data.nome;
       document.querySelector("#precoLivro").value = data.preco;
       document.querySelector("#sinopseLivro").textContent = data.sinopse;
     }
   };
   xhttp.open("GET", "editarLivro.php?id="+id, true);//executa o arquivo
   xhttp.send();//envia os dados?
}

//modal editarUsuario
function abrirModalUser(id) {
   modalUser.style.display = 'block';
   fundomodal.style.display = 'block';
   loadData(id);
}
function fecharModalUser() {
   modalUser.style.display = 'none';
   fundomodal.style.display = 'none';
}

function iniciarTab() {
   const menu = document.querySelectorAll(".listaMenu li");
   const conteudo = document.querySelectorAll("#conteudo section");

   if (menu.length && conteudo.length) {
      conteudo[0].classList.add("active");

      function activeTab(index) {
         conteudo.forEach((section) => {
            section.classList.remove("active");
         });
         conteudo[index].classList.add("active");
      }
      menu.forEach((itemMenu, index) => {
         itemMenu.addEventListener("click", () => {
            activeTab(index);
         });
      });
   }
}
iniciarTab();

//autor
$('#formAutor').submit(function(e) {
   e.preventDefault();

   var autorNome = $('#autorNome').val();
   $.ajax({
      url: '../lib/insereAutor.php',
      method: 'POST',
      data: {name: autorNome},
      dataType: 'json'
   }).done(function(result) {
      console.log(result);
   });
});

//editora
$('#formEditora').submit(function(e) {
   e.preventDefault();

   var editoraNome = $('#editoraNome').val();
   console.log(editoraNome);
   $.ajax({
      url: '../lib/insereEditora.php',
      method: 'POST',
      data: {name: editoraNome},
      dataType: 'json'
   }).done(function(result) {
      console.log(result);
   });
});