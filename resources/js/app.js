import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";
import "./swiper.js";
import "./lightbox.js";
// import "./contactForm.js";

Alpine.plugin(collapse);

//Alleen op coming soon template runnen
if (document.querySelector(".page-template-page-coming-soon")) {
  document.addEventListener("DOMContentLoaded", () => {
    document.querySelector(".wpcf7-email").focus();
  });
}

//bagOpen is false zodat deze niet getoond wordt.
Alpine.store("bagOpen", false);

//In success.php is een empty div met #trigger-side. Als deze in de DOM aanwezig (wanneer een product dus succesvol is toegevoegd) zetten we de state van bagOpen op true.
if (document.querySelector("#trigger-side")) {
  document.addEventListener("alpine:init", () => {
    //Plaats de $store wijziging in functie
    function openBag() {
      Alpine.store("bagOpen", true);
    }
    //Mbv timeOut kan de animatie afspelen
    setTimeout(openBag, 100);
  });
}

Alpine.start();

//Tab text change
window.onload = function () {
  var pageTitle = document.title;
  var attentionMessage = "HERE TO STAY";

  document.addEventListener("visibilitychange", function (e) {
    var isPageActive = !document.hidden;

    if (!isPageActive) {
      document.title = attentionMessage;
    } else {
      document.title = pageTitle;
    }
  });
};
