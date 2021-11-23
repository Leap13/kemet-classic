import { Base } from "./customizer";
import "./options/control";
const { kmtEvents } = window.KmtOptionComponent;

window.addEventListener('load', () => {
  let deviceButtons = document.querySelector('#customize-footer-actions .devices');
  deviceButtons.addEventListener('click', function (e) {
    console.log(e.target.dataset.device);
    const device = e.target.dataset.device;
    kmtEvents.trigger('KemetChangedRepsonsivePreview', device);
  });
});