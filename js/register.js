const form = document.querySelector(".form");
const campo = document.querySelectorAll(".required")
const spam = document.querySelectorAll(".span-validacao");
const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

function error(index) {
   campo[index].style.border = "2px solid #FF3636";
   spam[index].style.display = "block";
}
function correct(index) {
   campo[index].style.border = "2px solid #10c100";
   spam[index].style.display = "none";
}

function validacaoNome() {
   if (campo[0].value.length < 3) error(0); else correct(0);
}
function validaCPF() {
   campo[1].addEventListener('keypress', () => {
      let tamanhoInput = campo[1].value.length;

      if (tamanhoInput === 3 || tamanhoInput === 7) {
         campo[1].value += '.';
      } else if(tamanhoInput === 11) {
         campo[1].value += '-';
      }

      if(tamanhoInput >= 13) {
         correct(1);
      } else {
         error(1);
      }
   });
}
function validacaoEmail() {
   if (emailRegex.test(campo[2].value)) correct(2); else error(2);
}
function validacaoSenha() {
   if (campo[6].value.length < 8) error(6); else correct(6);
}