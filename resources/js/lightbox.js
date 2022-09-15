import Chocolat from "chocolat";

console.log("chocolate");

Chocolat(document.querySelectorAll(".chocolat-image"), {
  imageSize: "contain",
  linkImages: "true",
  loop: true,
  closeOnBackgroundClick: true,
  allowZoom: true,
});
