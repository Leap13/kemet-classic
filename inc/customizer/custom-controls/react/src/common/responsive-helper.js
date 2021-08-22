export function kemetGetResponsiveJs(control) {
  'use strict';

  let device = jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device')
  jQuery(document).find('.kmt-responsive-control-btns > li').removeClass('active');
  jQuery(document).find('.kmt-responsive-control-btns > li.' + device).addClass('active');
  jQuery(document).find(" .kmt-responsive-control-btns button i").on('click', function (event) {
    event.preventDefault();
    let device = jQuery(this).parent('button').attr('data-device');

    if ('desktop' == device) {
      device = 'tablet';
    } else if ('tablet' == device) {
      device = 'mobile';
    } else {
      device = 'desktop';
    }

    jQuery(document).find(' .kmt-responsive-control-btns > li').removeClass('active');
    jQuery(document).find('.kmt-responsive-control-btns > li.' + device).addClass('active');

    jQuery('.wp-full-overlay-footer .devices button[data-device="' + device + '"]').trigger('click');

  })
}

export function kemetGetResponsiveIconJs(control) {
  'use strict';

  let device = jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device')

  jQuery('.customize-control-kmt-responsive-icon-select .responsive-icon-select').removeClass('active');

  jQuery('.customize-control-kmt-responsive-icon-select .responsive-icon-select.' + device).addClass('active');

  jQuery('.customize-control .kmt-responsive-icon-select-btns li').removeClass('active');

  jQuery('.customize-control .kmt-responsive-icon-select-btns li.' + device).addClass('active');

  jQuery('.wp-full-overlay-footer .devices button').on('click', function () {

    let device = jQuery(this).attr('data-device');

    jQuery('.customize-control-kmt-responsive-icon-select .responsive-icon-select, .customize-control .kmt-spacing-responsive-btns > li').removeClass('active');
    jQuery('.customize-control-kmt-responsive-icon-select .responsive-icon-select.' + device + ', .customize-control .kmt-spacing-responsive-btns > li.' + device).addClass('active');
  });

  control.container.find('.kmt-responsive-icon-select-btns li button').on('click', function (event) {
    event.preventDefault();
    let device = jQuery(this).attr('data-device');
    if ('desktop' == device) {
      device = 'tablet';
    } else if ('tablet' == device) {
      device = 'mobile';
    } else {
      device = 'desktop';
    }

    jQuery('.wp-full-overlay-footer .devices button[data-device="' + device + '"]').trigger('click');
  });
}
export function kemetGetResponsiveColorJs(control, child_control_name) {
  'use strict';

  jQuery('html').addClass('responsive-background-color-ready');

  let device = jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device')

  jQuery('.customize-control-kmt-responsive-color .customize-control-content .kmt-color-picker-alpha').removeClass('active');

  jQuery('.customize-control-kmt-responsive-color .customize-control-content .kmt-color-picker-alpha.' + device).addClass('active');

  jQuery('.customize-control-kmt-responsive-color .kmt-color-responsive-btns li').removeClass('active');

  jQuery('.customize-control-kmt-responsive-color .kmt-color-responsive-btns li.' + device).addClass('active');

  jQuery('.wp-full-overlay-footer .devices button').on('click', function () {

    let device = jQuery(this).attr('data-device');

    jQuery('.customize-control-kmt-responsive-color .customize-control-content .kmt-color-picker-alpha').removeClass('active');
    jQuery('.customize-control-kmt-responsive-color .customize-control-content .kmt-responsive-color.' + device).addClass('active');
    jQuery('.customize-control-kmt-responsive-color .kmt-color-responsive-btns li').removeClass('active');
    jQuery('.customize-control-kmt-responsive-color .kmt-color-responsive-btns li.' + device).addClass('active');
  });

  control.container.find('.kmt-color-responsive-btns button').on('click', function (event) {
    event.preventDefault();
    let device = jQuery(this).attr('data-device');
    if ('desktop' == device) {
      device = 'tablet';
    } else if ('tablet' == device) {
      device = 'mobile';
    } else {
      device = 'desktop';
    }

    jQuery('.wp-full-overlay-footer .devices button[data-device="' + device + '"]').trigger('click');
  });
  if (child_control_name) {
    jQuery(document).mouseup(function (e) {
      var container = jQuery(child_control_name);
      var resColorWrap = container.find('.customize-control-content');
      // If the target of the click isn't the container nor a descendant of the container.
      if (!resColorWrap.is(e.target) && resColorWrap.has(e.target).length === 0) {
        container.find('.components-button.kemet-color-icon-indicate.open').click();
      }
    });
  }
}
export function kemetGetResponsiveBgJs(control, child_control_name) {
  'use strict';

  jQuery('html').addClass('responsive-background-img-ready');

  let device = jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device')

  jQuery('.customize-control-kmt-responsive-background .customize-control-content .background-container').removeClass('active');

  jQuery('.customize-control-kmt-responsive-background .customize-control-content .background-container.' + device).addClass('active');

  jQuery('.customize-control-kmt-responsive-background .kmt-responsive-btns li').removeClass('active');

  jQuery('.customize-control-kmt-responsive-background .kmt-responsive-btns li.' + device).addClass('active');

  jQuery('.wp-full-overlay-footer .devices button').on('click', function () {

    let device = jQuery(this).attr('data-device');

    jQuery('.customize-control-kmt-responsive-background .customize-control-content .background-container').removeClass('active');
    jQuery('.customize-control-kmt-responsive-background .customize-control-content .background-container.' + device).addClass('active');
    jQuery('.customize-control-kmt-responsive-background .kmt-responsive-btns li').removeClass('active');
    jQuery('.customize-control-kmt-responsive-background .kmt-responsive-btns li.' + device).addClass('active');
  });

  control.container.find('.kmt-responsive-btns button').on('click', function (event) {
    event.preventDefault();
    let device = jQuery(this).attr('data-device');
    if ('desktop' == device) {
      device = 'tablet';
    } else if ('tablet' == device) {
      device = 'mobile';
    } else {
      device = 'desktop';
    }

    jQuery('.wp-full-overlay-footer .devices button[data-device="' + device + '"]').trigger('click');
  });
  if (child_control_name) {
    jQuery(document).mouseup(function (e) {
      var container = jQuery(child_control_name);
      var bgWrap = container.find('.background-wrapper');
      // If the target of the click isn't the container nor a descendant of the container.
      if (!bgWrap.is(e.target) && bgWrap.has(e.target).length === 0) {
        container.find('.components-button.kemet-color-icon-indicate.open').click();
      }
    });
  }
}
export function KemetGetResponsiveColorGroupJs(control, child_control_name) {
  'use strict';

  let device = jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device')

  jQuery('.customize-control-kmt-color-group .kmt-field-color-group-wrap .kmt-color-group-responsive-wrap').removeClass('active');

  jQuery('.customize-control-kmt-color-group .kmt-field-color-group-wrap .kmt-color-group-responsive-wrap.' + device).addClass('active');

  jQuery('.customize-control-kmt-color-group .kmt-responsive-btns li').removeClass('active');

  jQuery('.customize-control-kmt-color-group .kmt-responsive-btns li.' + device).addClass('active');

  jQuery('.wp-full-overlay-footer .devices button').on('click', function () {

    let device = jQuery(this).attr('data-device');

    jQuery('.customize-control-kmt-color-group .kmt-field-color-group-wrap .kmt-color-group-responsive-wrap').removeClass('active');
    jQuery('.customize-control-kmt-color-group .kmt-field-color-group-wrap .kmt-color-group-responsive-wrap.' + device).addClass('active');
    jQuery('.customize-control-kmt-color-group .kmt-responsive-btns li').removeClass('active');
    jQuery('.customize-control-kmt-color-group .kmt-responsive-btns li.' + device).addClass('active');
  });

  control.container.find('.kmt-responsive-btns button').on('click', function (event) {
    event.preventDefault();
    let device = jQuery(this).attr('data-device');
    if ('desktop' == device) {
      device = 'tablet';
    } else if ('tablet' == device) {
      device = 'mobile';
    } else {
      device = 'desktop';
    }

    jQuery('.wp-full-overlay-footer .devices button[data-device="' + device + '"]').trigger('click');
  });
  if (child_control_name) {
    jQuery(document).mouseup(function (e) {
      var container = jQuery(child_control_name);
      var bgWrap = container.find('.background-wrapper');
      // If the target of the click isn't the container nor a descendant of the container.
      if (!bgWrap.is(e.target) && bgWrap.has(e.target).length === 0) {
        container.find('.components-button.kemet-color-icon-indicate.open').click();
      }
    });
  }
}