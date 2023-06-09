//slide 1
const slidesContainer = document.getElementById("slides-container");
const slide = document.querySelector(".slide");
const prevButton = document.getElementById("slide-arrow-prev");
const nextButton = document.getElementById("slide-arrow-next");

nextButton.addEventListener("click", () => {
   const slideWidth = slide.clientWidth;
   slidesContainer.scrollLeft += slideWidth;
});

prevButton.addEventListener("click", () => {
   const slideWidth = slide.clientWidth;
   slidesContainer.scrollLeft -= slideWidth;
});


//slide 2
function newsSlide() {
   const controls = document.querySelectorAll('.control');
   let currentItem = 0;
   const itens = document.querySelectorAll('.item');
   const maxItens = itens.length;

   controls.forEach(function (control) {
      control.addEventListener('click', () => {
         const isLeft = control.classList.contains('flechaEsquerda');

         if (isLeft) {
            currentItem -= 1;
         } else {
            currentItem += 1;
         }
         if (currentItem >= maxItens) {
            currentItem = 0;
         }
         if (currentItem < 0) {
            currentItem = 0;
         }

         itens.forEach(item =>
            item.classList.remove('current-item'));
         itens[currentItem].scrollIntoView({
            inline: "center",
            behavior: "smooth",
            block: "nearest"
         });

         itens[currentItem].classList.add('current-item');
      });
   });
}
newsSlide();