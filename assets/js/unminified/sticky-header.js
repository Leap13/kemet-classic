/**
 * File sticky-header.js
 *
 * Handles Headers in sticky mode
 *
 * @package Kemet
 */
var Header = document.querySelector('.kmt-sticky-header');
var sticky = Header.offsetHeight;

window.onscroll = function() {
  if (window.pageYOffset > sticky) {
    Header.classList.add("kmt-is-sticky")
  } else {
    Header.classList.remove("kmt-is-sticky");
  }
}