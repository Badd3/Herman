import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";
import Swiper, { Pagination, Mousewheel } from "swiper";
import "./lightbox.js";

Alpine.plugin(collapse);

//SWIPER HOME
const swiper = new Swiper(".swiper", {
  modules: [Pagination, Mousewheel],
  direction: "vertical",
  loop: true,
  speed: 500,
  mousewheel: {
    invert: false,
  },
  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
  },
});

//SWIPER SINGLE PRODUCT PAGE
const swiperSingleProduct = new Swiper(".swiper-single-product", {
  modules: [Pagination],
  direction: "horizontal",
  loop: false,
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


function playSound(herman) {
  document.getElementById(herman).play();
};
