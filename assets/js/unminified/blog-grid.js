/**
 *  Blog With Grid Style
 */
var $container = jQuery('.kmt-row').imagesLoaded( function() {
    $container.isotope({
          itemSelector : '.grid-item', 
          layoutMode : 'masonry',
          percentPosition: true
    });
});