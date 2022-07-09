import Alpine from "alpinejs";
import Swiper, { Autoplay, Pagination, EffectFade } from "swiper";

window.Alpine = Alpine;

const swiper = new Swiper(".swiper", {
  modules: [Autoplay, Pagination, EffectFade],
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
});

Alpine.start();
