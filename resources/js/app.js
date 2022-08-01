import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";
import Swiper, { Autoplay, Pagination, EffectFade } from "swiper";
Alpine.plugin(collapse);

const swiper = new Swiper(".swiper", {
  modules: [Autoplay, Pagination, EffectFade],
  direction: "vertical",
  loop: true,
  speed: 2000,
  // effect: "fade",
  autoplay: {
    delay: 5000,
  },

  allowTouchMove: false,
  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
  },
});

//Alleen op coming soon template runnen
if (document.querySelector(".page-template-page-coming-soon")) {
  document.addEventListener("DOMContentLoaded", () => {
    document.querySelector(".wpcf7-email").focus();
  });
}
Alpine.start();
