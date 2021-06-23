export function kemetGetResponsiveSliderJs(control) {
    'use strict';

    let device = jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device')

    jQuery('.wrapper .input-field-wrapper').removeClass('active');

    jQuery('.wrapper .input-field-wrapper.' + device).addClass('active');

    jQuery('.wrapper .kmt-responsive-control-btns li').removeClass('active');

    jQuery('.wrapper   .kmt-responsive-control-btns li.' + device).addClass('active');

    jQuery('.wp-full-overlay-footer .devices button').on('click', function () {

        let device = jQuery(this).attr('data-device');

        jQuery('.customize-control-kmt-responsive-slider .input-field-wrapper, .customize-control .kmt-responsive-slider-btns > li').removeClass('active');
        jQuery('.customize-control-kmt-responsive-slider .input-field-wrapper.' + device + ', .customize-control .kmt-responsive-slider-btns > li.' + device).addClass('active');
    });

    control.container.find('.kmt-responsive-control-btns button i').on('click', function (event) {
        event.preventDefault();
        let device = jQuery(this).parent('button').attr('data-device');
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
export function kemetGetResponsiveSpacingJs(control) {
    'use strict';

    let device = jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device')

    jQuery('.customize-control-kmt-responsive-spacing .input-wrapper .kmt-spacing-wrapper').removeClass('active');

    jQuery('.customize-control-kmt-responsive-spacing .input-wrapper .kmt-spacing-wrapper.' + device).addClass('active');

    jQuery('.customize-control .kmt-responsive-icon-select-btns li').removeClass('active');

    jQuery('.customize-control .kmt-responsive-icon-select-btns li.' + device).addClass('active');

    jQuery('.wp-full-overlay-footer .devices button').on('click', function () {

        let device = jQuery(this).attr('data-device');

        jQuery('.customize-control-kmt-responsive-spacing .input-wrapper .kmt-spacing-wrapper, .customize-control .kmt-spacing-responsive-btns > li').removeClass('active');
        jQuery('.customize-control-kmt-responsive-spacing .input-wrapper .kmt-spacing-wrapper.' + device + ', .customize-control .kmt-spacing-responsive-btns > li.' + device).addClass('active');
    });

    control.container.find('.kmt-spacing-responsive-btns button').on('click', function (event) {
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

    control.container.find('.kmt-spacing-responsive-btns button').on('click', function (event) {
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