const modal = document.querySelector('#modalLivro');
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
function abrirFecharAddEditora() {
   if(criarEditora.style.display == 'none') {
      criarEditora.style.display = 'block';
   } else {
      criarEditora.style.display = 'none';
   }
}
function abrirModalLivro() {
   modal.style.display = 'block';
   fundomodal.style.display = 'block';
}
function fecharModalLivro() {
   modal.style.display = 'none';
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