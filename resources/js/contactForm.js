document.addEventListener(
  "wpcf7mailsent",
  function (event) {
    const elements = document.querySelectorAll("[data-name]");
    for (const element of elements) {
      if (element.classList.contains("wpcf7-form-control-wrap")) {
        // Element has the wpcf7-form-control-wrap class

        element.classList.add("hidden");
      }
    }

    const submitButtons = document.querySelectorAll(".wpcf7-submit");
    for (const button of submitButtons) {
      // Element has the wpcf7-form-control-wrap class

      button.classList.add("hidden");
    }
  },
  false
);
