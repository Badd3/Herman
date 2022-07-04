import Alpine from "alpinejs";
import Swiper from "swiper/bundle";

window.Alpine = Alpine;

Alpine.start();

const swiper = new Swiper(".swiper", {
  direction: "horizontal",
  loop: true,
  effect: "fade",
  autoplay: {
    delay: 3000,
  },

  allowTouchMove: false,
  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
  },

  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  // And if we need scrollbar
  scrollbar: {
    el: ".swiper-scrollbar",
  },
});
