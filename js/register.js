const form = document.querySelector(".form");
const campo = document.querySelectorAll(".required")
const spam = document.querySelectorAll(".span-validacao");
const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

function error(index) {
   campo[index].style.border = "1px solid #FF3636";
   spam[index].style.display = "block";
}
function correct(index) {
   campo[index].style.border = "1px solid #10c100";
   spam[index].style.display = "none";
}

function validacaoNome() {
   if(campo[0].value.length < 3) error(0); else correct(0);  
}
function validacaoEmail() {
   if(emailRegex.test(campo[2].value)) correct(2); else error(2);
}
function validacaoSenha() {
   if(campo[4].value.length < 8) error(4); else correct(4);
}