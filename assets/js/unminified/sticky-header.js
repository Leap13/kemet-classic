var Header = document.querySelector('.kmt-sticky-header');
var sticky = Header.offsetHeight;
if( Header != null ) {
  window.onscroll = function() {
    if (window.pageYOffset > sticky) {
      Header.classList.add("kmt-is-sticky")
    } else {
      Header.classList.remove("kmt-is-sticky");
    }
  }
}
