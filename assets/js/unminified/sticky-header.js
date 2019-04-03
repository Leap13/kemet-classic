/**
 * File sticky-header.js
 *
 * Handles Headers in sticky mode
 *
 * @package Kemet
 */
var Header = document.querySelector('.kmt-sticky-header');
var sticky = Header.offsetHeight;
console.log("aya3",sticky)
window.onscroll = function() {
    console.log("aya",window.pageYOffset)
  if (window.pageYOffset > sticky) {
    Header.classList.add("kmt-is-sticky")
  } else {
    console.log("ayasss")
    Header.classList.remove("kmt-is-sticky");
  }
}