import Swiper, { Pagination, Mousewheel } from "swiper";

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
