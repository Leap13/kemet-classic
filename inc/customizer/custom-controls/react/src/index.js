import { Base } from "./customizer";

import "./options/control";

window.addEventListener("load", () => {
  let deviceButtons = document.querySelector(
    "#customize-footer-actions .devices"
  );
  deviceButtons.addEventListener("click", function (e) {
    let event = new CustomEvent("KemetChangedRepsonsivePreview", {
      detail: e.target.dataset.device,
    });
    document.dispatchEvent(event);
  });
});
