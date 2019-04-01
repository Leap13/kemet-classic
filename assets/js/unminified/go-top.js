/**
 * Go Top Link 
 */
window.onload = function() { 
    // Variables
    var arrowUp = document.getElementById('kmt-go-top');
    var intervalId = 0;

    // Functions
    function toggleArrow() {
        if (window.scrollY > 200) {
            arrowUp.classList.add('is-opacity');
        } else {
           arrowUp.classList.remove('is-opacity');
        }
    }

    function scrollStep() {
        if (window.pageYOffset === 0) {
            clearInterval(intervalId);
        }
        window.scroll(0, window.pageYOffset - 50);
    }

    function scrollToTop() {
        intervalId = setInterval(scrollStep,30);
    }

    // Event listeners
    arrowUp.addEventListener('click', scrollToTop);
    window.addEventListener('scroll', toggleArrow);       
}
