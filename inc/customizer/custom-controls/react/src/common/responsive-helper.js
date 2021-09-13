export function kemetGetResponsiveJs() {
  'use strict';

  let device = jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device')

  jQuery(document).find('.kmt-responsive-control-btns > li').removeClass('active');
  jQuery(document).find('.kmt-responsive-control-btns > li.' + device).addClass('active');

  jQuery(document).find('.kmt-responsive-control-btns button i').on('click', function (event) {
    event.preventDefault();
    let device = jQuery(this).parent('button').attr('data-device');

    if ('desktop' == device) {
      device = 'tablet';
    } else if ('tablet' == device) {
      device = 'mobile';
    } else {
      device = 'desktop';
    }

    jQuery(document).find('.kmt-responsive-control-btns > li').removeClass('active');
    jQuery(document).find('.kmt-responsive-control-btns > li.' + device).addClass('active');

    jQuery('.wp-full-overlay-footer .devices button[data-device="' + device + '"]').trigger('click');
  });
}