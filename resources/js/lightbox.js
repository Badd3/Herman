import Chocolat from "chocolat";

Chocolat(document.querySelectorAll(".chocolat-image"), {
  imageSize: "contain",
  linkImages: "true",
  loop: true,
  closeOnBackgroundClick: true,
  allowZoom: true,
});
