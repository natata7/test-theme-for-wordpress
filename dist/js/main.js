$(window).on('scroll', function () {
    var scroll = $(window).scrollTop();
    if (scroll < 500) {
        $("#header-sticky").removeClass("sticky-menu");
    } else {
        $("#header-sticky").addClass("sticky-menu");
    }
});
// $(document).ready(function(){
//     $('.hero_block').height($(window).height());
// });

let bg = document.querySelector('#card-1');
let fog1 = document.querySelector('#card-2');
let fog2 = document.querySelector('#mockup');
window.addEventListener('mousemove', function(e) {
    let x = e.clientX / window.innerWidth;
    let y = e.clientY / window.innerHeight;  
    bg.style.transform = 'translate(-' + x * 50 + 'px, -' + y * 50 + 'px)';
    fog1.style.transform = 'translate(+' + x * 50 + 'px, -' + y * 50 + 'px)';
    fog2.style.transform = 'translate(-' + x * 20 + 'px, -' + y * 20 + 'px)';
});


var swiper = new Swiper(".mySwiper", {
    spaceBetween: 100,
    slidesPerView: "auto",
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    slidesPerView: 1,
    centeredSlides: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
  });