/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 *
 * @package Kemet
 */

/**
 * Generate font size in PX & REM
 */
function kemet_font_size_rem(size, with_rem, device) {

	var css = '';

	if (size != '') {

		var device = (typeof device != undefined) ? device : 'desktop';

		// font size with 'px'.
		css = 'font-size: ' + size + 'px;';

		// font size with 'rem'.
		if (with_rem) {
			var body_font_size = wp.customize('kemet-settings[font-size-body]').get();

			body_font_size['desktop'] = (body_font_size['desktop'] != '') ? body_font_size['desktop'] : 15;
			body_font_size['tablet'] = (body_font_size['tablet'] != '') ? body_font_size['tablet'] : body_font_size['desktop'];
			body_font_size['mobile'] = (body_font_size['mobile'] != '') ? body_font_size['mobile'] : body_font_size['tablet'];

			css += 'font-size: ' + (size / body_font_size[device]) + 'rem;';
		}
	}

	return css;
}

/**
 * Responsive Font Size CSS
 */
function kemet_responsive_font_size(control, selector) {

	wp.customize(control, function (value) {
		value.bind(function (value) {

			if (value.desktop || value.mobile || value.tablet) {
				// Remove <style> first!
				control = control.replace('[', '-');
				control = control.replace(']', '');
				jQuery('style#' + control).remove();

				var fontSize = '',
					TabletFontSize = '',
					MobileFontSize = '';


				if ('' != value.desktop) {
					fontSize = 'font-size: ' + value.desktop + value['desktop-unit'];
				}
				if ('' != value.tablet) {
					TabletFontSize = 'font-size: ' + value.tablet + value['tablet-unit'];
				}
				if ('' != value.mobile) {
					MobileFontSize = 'font-size: ' + value.mobile + value['mobile-unit'];
				}

				if (value['desktop-unit'] == 'px') {
					fontSize = kemet_font_size_rem(value.desktop, true, 'desktop');
				}

				// Concat and append new <style>.
				jQuery('head').append(
					'<style id="' + control + '">'
					+ selector + '	{ ' + fontSize + ' }'
					+ '@media (max-width: 768px) {' + selector + '	{ ' + TabletFontSize + ' } }'
					+ '@media (max-width: 544px) {' + selector + '	{ ' + MobileFontSize + ' } }'
					+ '</style>'
				);

			} else {

				jQuery('style#' + control).remove();
			}

		});
	});
}

/**
 * Responsive Spacing CSS
 */
function kemet_responsive_spacing(control, selector, type, side) {

	wp.customize(control, function (value) {
		value.bind(function (value) {

			var sidesString = "";
			var spacingType = "padding";
			if (value.desktop.top || value.desktop.right || value.desktop.bottom || value.desktop.left || value.tablet.top || value.tablet.right || value.tablet.bottom || value.tablet.left || value.mobile.top || value.mobile.right || value.mobile.bottom || value.mobile.left) {
				if (typeof side != undefined) {
					sidesString = side + "";
					sidesString = sidesString.replace(/,/g, "-");
				}
				if (typeof type != undefined) {
					spacingType = type + "";
				}
				// Remove <style> first!
				control = control.replace('[', '-');
				control = control.replace(']', '');
				jQuery('style#' + control + '-' + spacingType + '-' + sidesString).remove();

				var desktopPadding = '',
					tabletPadding = '',
					mobilePadding = '';

				var paddingSide = (typeof side != undefined) ? side : ['top', 'bottom', 'right', 'left'];

				jQuery.each(paddingSide, function (index, sideValue) {
					if ('' != value['desktop'][sideValue]) {
						desktopPadding += spacingType + '-' + sideValue + ': ' + value['desktop'][sideValue] + value['desktop-unit'] + ';';
					}
				});

				jQuery.each(paddingSide, function (index, sideValue) {
					if ('' != value['tablet'][sideValue]) {
						tabletPadding += spacingType + '-' + sideValue + ': ' + value['tablet'][sideValue] + value['tablet-unit'] + ';';
					}
				});

				jQuery.each(paddingSide, function (index, sideValue) {
					if ('' != value['mobile'][sideValue]) {
						mobilePadding += spacingType + '-' + sideValue + ': ' + value['mobile'][sideValue] + value['mobile-unit'] + ';';
					}
				});

				// Concat and append new <style>.
				jQuery('head').append(
					'<style id="' + control + '-' + spacingType + '-' + sidesString + '">'
					+ selector + '	{ ' + desktopPadding + ' }'
					+ '@media (max-width: 768px) {' + selector + '	{ ' + tabletPadding + ' } }'
					+ '@media (max-width: 544px) {' + selector + '	{ ' + mobilePadding + ' } }'
					+ '</style>'
				);

			} else {
				wp.customize.preview.send('refresh');
				jQuery('style#' + control + '-' + spacingType + '-' + sidesString).remove();
			}

		});
	});
}
/**
 * Responsive Spacing CSS
 */
function kemet_responsive_slider(control, selector, type) {

	wp.customize(control, function (value) {
		value.bind(function (value) {
			var spacingType = "width";

			if (value.desktop || value.tablet || value.mobile) {
				if (typeof type != undefined) {
					spacingType = type + "";
				}
				// Remove <style> first!
				control = control.replace('[', '-');
				control = control.replace(']', '');
				jQuery('style#' + control + '-' + spacingType).remove();

				var desktopWidth = '',
					tabletWidth = '',
					mobileWidth = '';


				desktopWidth += spacingType + ': ' + value['desktop'] + value['desktop-unit'] + ' ;';

				tabletWidth += spacingType + ': ' + value['tablet'] + value['tablet-unit'] + ' ;';

				mobileWidth += spacingType + ': ' + value['mobile'] + value['mobile-unit'] + ' ;';

				// Concat and append new <style>.
				jQuery('head').append(
					'<style id="' + control + '-' + spacingType + '">'
					+ selector + '	{ ' + desktopWidth + ' }'
					+ '@media (max-width: 768px) {' + selector + '	{ ' + tabletWidth + ' } }'
					+ '@media (max-width: 544px) {' + selector + '	{ ' + mobileWidth + ' } }'
					+ '</style>'
				);

			} else {
				wp.customize.preview.send('refresh');
				jQuery('style#' + control + '-' + spacingType).remove();
			}

		});
	});
}
/**
 * CSS
 */
function kemet_css_font_size(control, selector) {

	wp.customize(control, function (value) {
		value.bind(function (size) {

			if (size) {

				// Remove <style> first!
				control = control.replace('[', '-');
				control = control.replace(']', '');
				jQuery('style#' + control).remove();

				var fontSize = 'font-size: ' + size;
				if (!isNaN(size) || size.indexOf('px') >= 0) {
					size = size.replace('px', '');
					fontSize = kemet_font_size_rem(size, true);
				}

				// Concat and append new <style>.
				jQuery('head').append(
					'<style id="' + control + '">'
					+ selector + '	{ ' + fontSize + ' }'
					+ '</style>'
				);

			} else {

				jQuery('style#' + control).remove();
			}

		});
	});
}

/**
 * Return get_hexdec()
 */
function get_hexdec(hex) {
	var hexString = hex.toString(16);
	return parseInt(hexString, 16);
}

/**
 * Apply CSS for the element
 */
function kemet_css(control, css_property, selector, unit) {

	wp.customize(control, function (value) {
		value.bind(function (new_value) {

			// Remove <style> first!
			control = control.replace('[', '-');
			control = control.replace(']', '');

			if (new_value) {

				/**
				 *	If ( unit == 'url' ) then = url('{VALUE}')
				 *	If ( unit == 'px' ) then = {VALUE}px
				 *	If ( unit == 'em' ) then = {VALUE}em
				 *	If ( unit == 'rem' ) then = {VALUE}rem.
				 */
				if ('undefined' != typeof unit) {

					if ('url' === unit) {
						new_value = 'url(' + new_value + ')';
					} else {
						new_value = new_value + unit;
					}
				}

				// Remove old.
				jQuery('style#' + control).remove();

				// Concat and append new <style>.
				jQuery('head').append(
					'<style id="' + control + '">'
					+ selector + '	{ ' + css_property + ': ' + new_value + ' }'
					+ '</style>'
				);

			} else {

				wp.customize.preview.send('refresh');

				// Remove old.
				jQuery('style#' + control).remove();
			}

		});
	});
}


/**
 * Dynamic Internal/Embedded Style for a Control
 */
function kemet_add_dynamic_css(control, style) {
	control = control.replace('[', '-');
	control = control.replace(']', '');
	jQuery('style#' + control).remove();

	jQuery('head').append(
		'<style id="' + control + '">' + style + '</style>'
	);
}

/**
 * Generate background_obj CSS
 */
function kemet_background_obj_css(wp_customize, bg_obj, ctrl_name, style) {
	
	var gen_bg_css = '';
	var bg_img = bg_obj['background-image'];
	var bg_color = bg_obj['background-color'];

	if ('' === bg_color && '' === bg_img) {
		wp_customize.preview.send('refresh');
	} else {
		if ('' !== bg_img && '' !== bg_color) {
			if (undefined !== bg_color) {
				gen_bg_css = 'background-image: linear-gradient(to right, ' + bg_color + ', ' + bg_color + '), url(' + bg_img + ');';
			}
		} else if ('' !== bg_img) {
			gen_bg_css = 'background-image: url(' + bg_img + ');';
		} else if ('' !== bg_color) {
			gen_bg_css = 'background-color: ' + bg_color + ';';
			gen_bg_css += 'background-image: none;';
		}

		if ('' !== bg_img) {

			gen_bg_css += 'background-repeat: ' + bg_obj['background-repeat'] + ';';
			gen_bg_css += 'background-position: ' + bg_obj['background-position'] + ';';
			gen_bg_css += 'background-size: ' + bg_obj['background-size'] + ';';
			gen_bg_css += 'background-attachment: ' + bg_obj['background-attachment'] + ';';
		}
		var dynamicStyle = style.replace("{{css}}", gen_bg_css);

		kemet_add_dynamic_css(ctrl_name, dynamicStyle);
	}
}

(function ($) {

	kemet_responsive_slider('kemet-settings[kmt-header-responsive-logo-width]', '#sitehead .site-logo-img .custom-logo-link img', 'max-width');
	kemet_responsive_slider('kemet-settings[kmt-header-responsive-logo-width]', '.kemet-logo-svg', 'width');
	/*
	 * Full width layout
	 */
	wp.customize('kemet-settings[site-content-width]', function (setting) {
		setting.bind(function (width) {


			var dynamicStyle = '@media (min-width: 554px) {';
			dynamicStyle += '.kmt-container, .fl-builder #content .entry-header { max-width: ' + (40 + parseInt(width)) + 'px } ';
			dynamicStyle += '}';
			if (jQuery('body').hasClass('kmt-page-builder-template')) {
				dynamicStyle += '@media (min-width: 554px) {';
				dynamicStyle += '.kmt-page-builder-template .comments-area { max-width: ' + (40 + parseInt(width)) + 'px } ';
				dynamicStyle += '}';
			}

			kemet_add_dynamic_css('site-content-width', dynamicStyle);

		});
	});

	/*
	 * Full width layout
	 */
	wp.customize('kemet-settings[header-main-menu-label]', function (setting) {
		setting.bind(function (label) {
			if ($('button.main-header-menu-toggle .mobile-menu-wrap .mobile-menu').length > 0) {
				if (label != '') {
					$('button.main-header-menu-toggle .mobile-menu-wrap .mobile-menu').text(label);
				} else {
					$('button.main-header-menu-toggle .mobile-menu-wrap').remove();
				}
			} else {
				var html = $('button.main-header-menu-toggle').html();
				if ('' != label) {
					html += '<div class="mobile-menu-wrap"><span class="mobile-menu">' + label + '</span> </div>';
				}
				$('button.main-header-menu-toggle').html(html)
			}
		});
	});

	/*
	 * Layout Body Background
	 */
	wp.customize('kemet-settings[site-layout-outside-bg-obj]', function (value) {
		value.bind(function (bg_obj) {

			var dynamicStyle = 'body,.kmt-separate-container { {{css}} }';

			kemet_background_obj_css(wp.customize, bg_obj, 'site-layout-outside-bg-obj', dynamicStyle);
		});
	});

    /*
	 * Boxed Inner Background
	 */
	wp.customize('kemet-settings[site-boxed-inner-bg]', function (value) {
		value.bind(function (bg_obj) {

			var dynamicStyle = '.kmt-separate-container .kmt-article-post,.single-post.kmt-separate-container .comments-area ,.single-post.kmt-separate-container .kmt-author-box , .kmt-separate-container .kmt-article-single { {{css}} }';

			kemet_background_obj_css(wp.customize, bg_obj, 'site-boxed-inner-bg', dynamicStyle);
		});
	});

	/*
	 * Blog Custom Width
	 */
	wp.customize('kemet-settings[blog-max-width]', function (setting) {
		setting.bind(function (width) {

			var dynamicStyle = '@media all and ( min-width: 921px ) {';

			if (!jQuery('body').hasClass('kmt-woo-shop-archive')) {
				dynamicStyle += '.blog .site-content > .kmt-container,.archive .site-content > .kmt-container{ max-width: ' + (parseInt(width)) + 'px } ';
			}

			if (jQuery('body').hasClass('kmt-fluid-width-layout')) {
				dynamicStyle += '.blog .site-content > .kmt-container,.archive .site-content > .kmt-container{ padding-left:20px; padding-right:20px; } ';
			}
			dynamicStyle += '}';
			kemet_add_dynamic_css('blog-max-width', dynamicStyle);

		});
	});

	/*
	 * Sub Menu Width
	 */
	wp.customize('kemet-settings[submenu-width]', function (setting) {
		setting.bind(function (width) {
			dynamicStyle = 'body:not(.kmt-header-break-point) .main-header-menu ul.sub-menu{ width: ' + (parseInt(width)) + 'px } ';
			kemet_add_dynamic_css('submenu-width', dynamicStyle);

		});
	});

	/*
	 * Single Blog Custom Width
	 */
	wp.customize('kemet-settings[blog-single-max-width]', function (setting) {
		setting.bind(function (width) {

			var dynamicStyle = '@media all and ( min-width: 921px ) {';

			dynamicStyle += '.single-post .site-content > .kmt-container{ max-width: ' + (40 + parseInt(width)) + 'px } ';

			if (jQuery('body').hasClass('kmt-fluid-width-layout')) {
				dynamicStyle += '.single-post .site-content > .kmt-container{ padding-left:20px; padding-right:20px; } ';
			}
			dynamicStyle += '}';
			kemet_add_dynamic_css('blog-single-max-width', dynamicStyle);

		});
	});

	/**
	 * Primary Width Option
	 */
	wp.customize('kemet-settings[site-sidebar-width]', function (setting) {
		setting.bind(function (width) {

			if (!jQuery('body').hasClass('kmt-no-sidebar') && width >= 15 && width <= 50) {

				var dynamicStyle = '@media (min-width: 769px) {';

				dynamicStyle += '#primary { width: ' + (100 - parseInt(width)) + '% } ';
				dynamicStyle += '#secondary { width: ' + width + '% } ';
				dynamicStyle += '}';

				kemet_add_dynamic_css('site-sidebar-width', dynamicStyle);
			}

		});
	});

	/**
	 * Small Footer Top Border
	 */
	wp.customize('kemet-settings[footer-copyright-divider]', function (value) {
		value.bind(function (border_width) {
			jQuery('.kmt-footer-copyright').css('border-top-width', border_width + 'px');
		});
	});

	/**
	 * Small Footer Top Border Color
	 */
	wp.customize('kemet-settings[footer-copyright-divider-color]', function (value) {
		value.bind(function (border_color) {
			jQuery('.kmt-footer-copyright').css('border-top-color', border_color);
		});
	});

	/**
	 * Button Border Radius
	 */
	kemet_responsive_slider('kemet-settings[button-radius]', '.menu-toggle,button,.kmt-button,input#submit,input[type="button"],input[type="submit"],input[type="reset"]', 'border-radius');
	if (jQuery('body').hasClass('woocommerce')) {
		kemet_responsive_slider('kemet-settings[button-radius]', '.woocommerce a.button, .woocommerce button.button, .woocommerce .product a.button, .woocommerce .woocommerce-message a.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button,.woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled]', 'border-radius');
	}
	/**
	 * Button Border Color
	 */

	wp.customize('kemet-settings[btn-border-color]', function (value) {
		value.bind(function (border_color) {
			jQuery('.menu-toggle, button, .kmt-button, input[type=button], input[type=button]:focus, input[type=button]:hover, input[type=reset], input[type=reset]:focus, input[type=reset]:hover, input[type=submit], input[type=submit]:focus, input[type=submit]:hover').css('border-color', border_color);
			if (jQuery('body').hasClass('woocommerce')) {
				jQuery('.woocommerce a.button, .woocommerce button.button, .woocommerce .product a.button, .woocommerce .woocommerce-message a.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button,.woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled').css('border-color', border_color);
			}
		});
	});
	wp.customize('kemet-settings[btn-border-h-color]', function (value) {
		value.bind(function (color) {
			if (color == '') {
				wp.customize.preview.send('refresh');
			}
			if (color) {

				var dynamicStyle = 'button:focus, .menu-toggle:hover, button:hover, .kmt-button:hover, .button:hover, input[type=reset]:hover, input[type=reset]:focus, input#submit:hover, input#submit:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="submit"]:hover, input[type="submit"]:focus { border-color: ' + color + '; } ';
				kemet_add_dynamic_css('btn-border-h-color', dynamicStyle);
			}
			if (jQuery('body').hasClass('woocommerce')) {
				jQuery('.woocommerce a.button, .woocommerce button.button, .woocommerce .product a.button, .woocommerce .woocommerce-message a.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button,.woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled').css('border-color', border_color);
			}
		});
	});
	wp.customize('kemet-settings[btn-border-size]', function (setting) {
		setting.bind(function (border) {

			var dynamicStyle = '.menu-toggle, button, .kmt-button, input[type=button], input[type=button]:focus, input[type=button]:hover, input[type=reset], input[type=reset]:focus, input[type=reset]:hover, input[type=submit], input[type=submit]:focus, input[type=submit]:hover { border-width: ' + border + 'px }';

			kemet_add_dynamic_css('btn-border-size', dynamicStyle);
		});
	});

	/**
	 * Button Vertical Padding
	 */
	wp.customize('kemet-settings[button-v-padding]', function (setting) {
		setting.bind(function (padding) {

			var dynamicStyle = '.menu-toggle,button,.kmt-button,input#submit,input[type="button"],input[type="submit"],input[type="reset"] { padding-top: ' + (parseInt(padding)) + 'px; padding-bottom: ' + (parseInt(padding)) + 'px } ';

			if (jQuery('body').hasClass('woocommerce')) {
				dynamicStyle += '.woocommerce a.button, .woocommerce button.button, .woocommerce .product a.button, .woocommerce .woocommerce-message a.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button,.woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled] { padding-top: ' + (parseInt(padding)) + 'px; padding-bottom: ' + (parseInt(padding)) + 'px } ';
			}
			kemet_add_dynamic_css('button-v-padding', dynamicStyle);

		});
	});

	/**
	 * Button Horizontal Padding
	 */
	wp.customize('kemet-settings[button-h-padding]', function (setting) {
		setting.bind(function (padding) {

			var dynamicStyle = '.menu-toggle,button,.kmt-button,input#submit,input[type="button"],input[type="submit"],input[type="reset"] { padding-left: ' + (parseInt(padding)) + 'px; padding-right: ' + (parseInt(padding)) + 'px } ';
			if (jQuery('body').hasClass('woocommerce')) {
				dynamicStyle += '.woocommerce a.button, .woocommerce button.button, .woocommerce .product a.button, .woocommerce .woocommerce-message a.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button,.woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled] { padding-left: ' + (parseInt(padding)) + 'px; padding-right: ' + (parseInt(padding)) + 'px } ';
			}
			kemet_add_dynamic_css('button-h-padding', dynamicStyle);

		});
	});

	/**
	 * Header Bottom Border width
	 */
	kemet_responsive_slider('kemet-settings[header-main-sep]', 'body:not(.kmt-header-break-point) .main-header-bar, .header-main-layout-5 .main-header-container.logo-menu-icon', 'border-bottom-width');

	/**
     * widget Padding
     */
	kemet_responsive_spacing('kemet-settings[widget-padding]', '.sidebar-main .widget', 'padding', ['top', 'bottom', 'right', 'left']);

	// widget margin bottom.
	wp.customize('kemet-settings[widget-margin-bottom]', function (value) {
		value.bind(function (marginBottom) {
			if (marginBottom == '') {
				wp.customize.preview.send('refresh');
			}

			if (marginBottom) {
				var dynamicStyle = '.sidebar-main .widget { margin-bottom: ' + marginBottom + 'em; } ';
				kemet_add_dynamic_css('widget-margin-bottom', dynamicStyle);
			}

		});
	});

	/**
	 * Header Bottom Border color
	 */
	wp.customize('kemet-settings[header-main-sep-color]', function (value) {
		value.bind(function (color) {
			if (color == '') {
				wp.customize.preview.send('refresh');
			}

			if (color) {

				var dynamicStyle = ' body:not(.kmt-header-break-point) .main-header-bar, .header-main-layout-5 .main-header-container.logo-menu-icon { border-bottom-color: ' + color + '; } ';
				dynamicStyle += ' body.kmt-header-break-point .site-header { border-bottom-color: ' + color + '; } ';

				kemet_add_dynamic_css('header-main-sep-color', dynamicStyle);
			}

		});
	});
	/**
	 * Header background
	 */
	wp.customize('kemet-settings[header-bg-obj]', function (value) {
		value.bind(function (bg_obj) {
			
			var dynamicStyle = ' body:not(.kmt-header-break-point) .site-header .main-header-bar { {{css}} }';
			kemet_background_obj_css(wp.customize, bg_obj, 'header-bg-obj', dynamicStyle);
		});
	});

	/**
     * Header Spacing
     */
	kemet_responsive_spacing('kemet-settings[header-padding]', '.main-header-bar', 'padding', ['top', 'bottom', 'right', 'left']);
	kemet_responsive_spacing('kemet-settings[last-menu-item-spacing]', '.site-header .kmt-sitehead-custom-menu-items > div', 'padding', ['top', 'bottom', 'right', 'left']);

	/**
	 * menu background
	 */
	wp.customize('kemet-settings[menu-bg-color]', function (value) {
		value.bind(function (bg_obj) {

			var dynamicStyle = '.main-header-menu { {{css}} }';

			kemet_background_obj_css(wp.customize, bg_obj, 'menu-bg-color', dynamicStyle);
		});
	});
	kemet_css('kemet-settings[menu-link-color]', 'color', '.main-header-menu a');
	kemet_css('kemet-settings[menu-link-bottom-border-color]', 'border-bottom-color', '.main-header-menu > .menu-item:hover > a');
	kemet_css('kemet-settings[menu-items-text-transform]', 'text-transform', '.main-header-menu a');
	kemet_css('kemet-settings[menu-items-line-height]', 'line-height', '.main-header-menu > .menu-item > a, .main-header-menu > .menu-item');

	kemet_css('kemet-settings[menu-link-h-color]', 'color', '.main-header-menu li:hover a, .main-header-menu .kmt-sitehead-custom-menu-items a:hover');
	kemet_css('kemet-settings[menu-link-active-color]', 'color', '.main-header-menu li.current-menu-item a, .main-header-menu li.current_page_item a, .main-header-menu .current-menu-ancestor > a');
	/**
	 * submenu background
	 */
	kemet_css('kemet-settings[sub-menu-items-text-transform]', 'text-transform', '.main-header-menu .sub-menu li a');
	kemet_css('kemet-settings[sub-menu-items-line-height]', 'line-height', '.main-header-menu .sub-menu li a');
	
	wp.customize('kemet-settings[submenu-bg-color]', function (value) {
		value.bind(function (bg_obj) {

			var dynamicStyle = '.main-header-menu ul { {{css}} }';

			kemet_background_obj_css(wp.customize, bg_obj, 'submenu-bg-color', dynamicStyle);
		});
	});
	//Search
	kemet_css('kemet-settings[search-btn-bg-color]', 'background-color', '.kmt-search-menu-icon .search-submit');
	kemet_css('kemet-settings[search-btn-h-bg-color]', 'background-color', '.kmt-search-menu-icon .search-submit:hover');
	kemet_css('kemet-settings[search-btn-color]', 'color', '.kmt-search-menu-icon .search-submit');
	kemet_css('kemet-settings[search-input-bg-color]', 'background-color', '.kmt-search-menu-icon form .search-field');
	kemet_css('kemet-settings[search-input-color]', 'color', '.kmt-search-menu-icon form .search-field');
	wp.customize('kemet-settings[search-border-size]', function (setting) {
		setting.bind(function (border) {
			var dynamicStyle = '.search-box .kmt-search-menu-icon .search-form { border-width: ' + border + 'px } .top-bar-search-box .kemet-top-header-section .kmt-search-menu-icon .search-form { border-width: ' + border + 'px }';

			kemet_add_dynamic_css('search-border-size', dynamicStyle);
		});
	});
	wp.customize('kemet-settings[search-border-color]', function (value) {
		value.bind(function (border_color) {
			jQuery('.kmt-search-menu-icon form').css('border-color', border_color);
			jQuery('.kmt-search-menu-icon form').css('background-color', border_color);
		});
	});
	/**submenu color */
	kemet_css('kemet-settings[submenu-link-color]', 'color', '.main-header-menu .sub-menu li a');
	kemet_css('kemet-settings[submenu-link-h-color]', 'color', '.main-header-menu .sub-menu li:hover > a');

	/**
	 * SubMenu Top Border
	 */
	wp.customize('kemet-settings[submenu-top-border-size]', function (setting) {
		setting.bind(function (border) {

			var dynamicStyle = '.main-header-menu ul.sub-menu { border-top-width: ' + border + 'px }';

			kemet_add_dynamic_css('submenu-top-border-size', dynamicStyle);

		});
	});

	/**
	 * SubMenu Top Border color
	 */
	wp.customize('kemet-settings[submenu-top-border-color]', function (value) {
		value.bind(function (color) {
			if (color == '') {
				wp.customize.preview.send('refresh');
			}

			if (color) {

				var dynamicStyle = '.main-header-menu ul.sub-menu { border-top-color: ' + color + '; } ';

				kemet_add_dynamic_css('submenu-top-border-color', dynamicStyle);
			}

		});
	});

	/**
	 * SubMenu Border color
	 */
	wp.customize('kemet-settings[submenu-border-color]', function (value) {
		value.bind(function (border_color) {
			jQuery('.main-header-menu .sub-menu a').css('border-color', border_color);
		});
	});

	kemet_css('kemet-settings[submenu-link-h-color]', 'color', '.main-header-menu .sub-menu li:hover > a');

	/**
	 * Mobile Menu color
	 */
	kemet_css('kemet-settings[mobile-menu-icon-color]', 'color', '.kmt-mobile-menu-buttons .menu-toggle .menu-toggle-icon');
	kemet_css('kemet-settings[mobile-menu-icon-h-color]', 'color', '.kmt-mobile-menu-buttons .menu-toggle:hover .menu-toggle-icon, .kmt-mobile-menu-buttons .menu-toggle.toggled .menu-toggle-icon');
	kemet_css('kemet-settings[mobile-menu-icon-bg-color]', 'background-color', '.kmt-mobile-menu-buttons .menu-toggle');
	kemet_css('kemet-settings[mobile-menu-icon-bg-h-color]', 'background-color', '.kmt-mobile-menu-buttons .menu-toggle:hover, .kmt-mobile-menu-buttons .menu-toggle.toggled');
	kemet_css('kemet-settings[mobile-menu-items-color]', 'color', '.toggle-on li a');
	kemet_css('kemet-settings[mobile-menu-items-h-color]', 'color', '.toggle-on .main-header-menu li a:hover, .toggle-on .main-header-menu li.current-menu-item a, .toggle-on .main-header-menu li.current_page_item a, .toggle-on .main-header-menu .current-menu-ancestor > a, .toggle-on .main-header-menu .sub-menu li:hover a');

	/**
	 * Container Inner Spacing
	 */
	kemet_responsive_spacing('kemet-settings[container-inner-spacing]', '.kmt-separate-container .kmt-article-post, .kmt-separate-container .kmt-article-single, .kmt-separate-container .comment-respond, .single.kmt-separate-container .kmt-author-details, .kmt-separate-container .kmt-related-posts-wrap, .kmt-separate-container .kmt-woocommerce-container', 'padding', ['top', 'bottom', 'right', 'left']);
    /**
	 * Site Identity Spacing
	 */
	kemet_responsive_spacing('kemet-settings[site-identity-spacing]', '#sitehead.site-header .kmt-site-identity', 'padding', ['top', 'right', 'bottom', 'left']);

    /**
     * Footer Padding
     */
	kemet_responsive_spacing('kemet-settings[footer-padding]', '.kemet-footer .kmt-container', 'padding', ['top', 'bottom', 'right', 'left']);
	kemet_responsive_spacing('kemet-settings[footer-widget-padding]', '.kemet-footer .kemet-footer-widget', 'padding', ['top', 'bottom', 'right', 'left']);
	kemet_responsive_slider('kemet-settings[menu-font-size]', '.main-header-menu a', 'font-size');
	kemet_responsive_slider('kemet-settings[font-size-site-tagline]', '.site-header .site-description', 'font-size');
	kemet_responsive_slider('kemet-settings[site-title-font-size]', '.site-title', 'font-size');
	kemet_responsive_slider('kemet-settings[font-size-entry-title]', '.kmt-single-post entry-header .entry-title, .page-title', 'font-size');
	kemet_responsive_slider('kemet-settings[font-size-archive-summary-title]', '.kmt-archive-description .kmt-archive-title', 'font-size');
	kemet_responsive_slider('kemet-settings[kemet-footer-widget-title-font-size]', '.kemet-footer .widget-title', 'font-size');
	kemet_responsive_slider('kemet-settings[font-size-page-title]', 'body:not(.kmt-single-post) .entry-title', 'font-size');
	kemet_responsive_slider('kemet-settings[font-size-page-meta]', 'body:not(.kmt-single-post) .entry-meta', 'font-size');
	kemet_responsive_slider('kemet-settings[font-size-h1]', 'h1, .entry-content h1, .entry-content h1 a', 'font-size');
	kemet_responsive_slider('kemet-settings[font-size-h2]', 'h2, .entry-content h2, .entry-content h2 a', 'font-size');
	kemet_responsive_slider('kemet-settings[font-size-h3]', 'h3, .entry-content h3, .entry-content h3 a', 'font-size');
	kemet_responsive_slider('kemet-settings[font-size-h4]', 'h4, .entry-content h4, .entry-content h4 a', 'font-size');
	kemet_responsive_slider('kemet-settings[font-size-h5]', 'h5, .entry-content h5, .entry-content h5 a', 'font-size');
	kemet_responsive_slider('kemet-settings[font-size-h6]', 'h6, .entry-content h6, .entry-content h6 a', 'font-size');
	/**
	 * Content Heading Color
	 */
	kemet_css('kemet-settings[font-color-h1]', 'color', 'h1, .entry-content h1, .entry-content h1 a');
	kemet_css('kemet-settings[font-color-h2]', 'color', 'h2, .entry-content h2, .entry-content h2 a');
	kemet_css('kemet-settings[font-color-h3]', 'color', 'h3, .entry-content h3, .entry-content h3 a');
	kemet_css('kemet-settings[font-color-h4]', 'color', 'h4, .entry-content h4, .entry-content h4 a');
	kemet_css('kemet-settings[font-color-h5]', 'color', 'h5, .entry-content h5, .entry-content h5 a');
	kemet_css('kemet-settings[font-color-h6]', 'color', 'h6, .entry-content h6, .entry-content h6 a');
	kemet_css('kemet-settings[site-title-color]', 'color', '.site-title a');
	kemet_css('kemet-settings[site-title-h-color]', 'color', '.site-title a:hover');

	kemet_css('kemet-settings[body-line-height]', 'line-height', 'body, button, input, select, textarea');

	// paragraph margin bottom.
	wp.customize('kemet-settings[para-margin-bottom]', function (value) {
		value.bind(function (marginBottom) {
			if (marginBottom == '') {
				wp.customize.preview.send('refresh');
			}

			if (marginBottom) {
				var dynamicStyle = ' p, .entry-content p { margin-bottom: ' + marginBottom + 'em; } ';
				kemet_add_dynamic_css('para-margin-bottom', dynamicStyle);
			}

		});
	});

	kemet_css('kemet-settings[body-text-transform]', 'text-transform', 'body, button, input, select, textarea');

	kemet_css('kemet-settings[headings-text-transform]', 'text-transform', 'h1, .entry-content h1, .entry-content h1 a, h2, .entry-content h2, .entry-content h2 a, h3, .entry-content h3, .entry-content h3 a, h4, .entry-content h4, .entry-content h4 a, h5, .entry-content h5, .entry-content h5 a, h6, .entry-content h6, .entry-content h6 a');

	/**
     * widget Padding
     */
	kemet_responsive_spacing('kemet-settings[widget-padding]', '.sidebar-main .widget', 'padding', ['top', 'bottom', 'right', 'left']);
	//Sidebar Widget Title Typography
	kemet_css('kemet-settings[widget-title-text-transform]', 'text-transform', '.sidebar-main .widget-title');
	kemet_css('kemet-settings[widget-title-line-height]', 'line-height', '.sidebar-main .widget-title');
	kemet_responsive_slider('kemet-settings[widget-title-font-size]', '.sidebar-main .widget-title', 'font-size');
	kemet_css('kemet-settings[widget-title-color]', 'color', '.sidebar-main .widget-title');
	/**
	 * widget Title Border width
	 */
	wp.customize('kemet-settings[widget-title-border-size]', function (value) {
		value.bind(function (border) {

			var dynamicStyle = '.sidebar-main .widget-title { border-bottom-width: ' + border + 'px }';
			dynamicStyle += '}';

			kemet_add_dynamic_css('widget-title-border-size', dynamicStyle);

		});
	});

	/**
	 * widget Title Border color
	 */
	wp.customize('kemet-settings[widget-title-border-color]', function (value) {
		value.bind(function (color) {
			if (color == '') {
				wp.customize.preview.send('refresh');
			}

			if (color) {

				var dynamicStyle = '.sidebar-main .widget-title { border-bottom-color: ' + color + '; } ';

				kemet_add_dynamic_css('widget-title-border-color', dynamicStyle);
			}

		});
	});


	/**
	 * Widget Title Font 
	 */
	kemet_css('kemet-settings[kemet-footer-wgt-title-text-transform]', 'text-transform', '.kemet-footer .kmt-no-widget-row .widget-title');
	kemet_css('kemet-settings[kemet-footer-wgt-title-line-height]', 'line-height', '.kemet-footer .widget-title');

	// Footer Bar.
	kemet_css('kemet-settings[footer-color]', 'color', '.kmt-footer-copyright');
	kemet_css('kemet-settings[footer-link-color]', 'color', '.kmt-footer-copyright a');
	kemet_css('kemet-settings[footer-link-h-color]', 'color', '.kmt-footer-copyright a:hover');
	kemet_css('kemet-settings[font-color-entry-title]', 'color', '.kmt-single-post .entry-title, .page-title');

	wp.customize('kemet-settings[footer-bg-obj]', function (value) {
		value.bind(function (bg_obj) {

			var dynamicStyle = ' .kmt-footer-copyright > .kmt-footer-copyright-content { {{css}} }';

			kemet_background_obj_css(wp.customize, bg_obj, 'footer-bg-obj', dynamicStyle);
		});
	});

	// Footer Font
	kemet_css('kemet-settings[footer-text-transform]', 'text-transform', '.kemet-footer');
	kemet_css('kemet-settings[footer-line-height]', 'line-height', '.kemet-footer');
	kemet_responsive_slider('kemet-settings[footer-font-size]', '.kemet-footer', 'font-size');

	// Footer Widgets.
	kemet_css('kemet-settings[kemet-footer-wgt-title-color]', 'color', '.kemet-footer .widget-title, .kemet-footer .widget-title a');
	kemet_css('kemet-settings[kemet-footer-text-color]', 'color', '.site-footer');
	kemet_css('kemet-settings[kemet-footer-widget-meta-color]', 'color', '.kemet-footer .post-date');
	kemet_css('kemet-settings[footer-button-color]', 'color', '.kemet-footer button, .kemet-footer .kmt-button, .kemet-footer .button, .kemet-footer input#submit, .kemet-footer input[type=“button”], .kemet-footer input[type=“submit”], .kemet-footerinput[type=“reset”]');
	kemet_css('kemet-settings[footer-button-h-color]', 'color', '.kemet-footer button:focus, .kemet-footer button:hover, .kemet-footer .kmt-button:hover, .kemet-footer .button:hover, .kemet-footer input[type=reset]:hover, .kemet-footer input[type=reset]:focus, .kemet-footer input#submit:hover, .kemet-footer input#submit:focus, .kemet-footer input[type="button"]:hover, .kemet-footer input[type="button"]:focus, .kemet-footer input[type="submit"]:hover, .kemet-footer input[type="submit"]:focus');

	wp.customize('kemet-settings[kemet-footer-bg-obj]', function (value) {
		value.bind(function (bg_obj) {

			var dynamicStyle = ' .kemet-footer-overlay { {{css}} }';

			kemet_background_obj_css(wp.customize, bg_obj, 'kemet-footer-bg-obj', dynamicStyle);
		});
	});


	wp.customize('kemet-settings[footer-button-bg-color]', function (value) {
		value.bind(function (bg_obj) {

			var dynamicStyle = ' .kemet-footer > input[type="submit"] { {{css}} }';

			kemet_background_obj_css(wp.customize, bg_obj, 'footer-button-bg-color', dynamicStyle);
		});
	});

	wp.customize('kemet-settings[footer-button-bg-h-color]', function (value) {
		value.bind(function (bg_obj) {

			var dynamicStyle = ' .kemet-footer > input[type="submit"]:hover { {{css}} }';

			kemet_background_obj_css(wp.customize, bg_obj, 'footer-button-bg-h-color', dynamicStyle);
		});
	});

	/**
	 * Footer Button Border Radius
	 */
	kemet_responsive_slider('kemet-settings[footer-button-radius]', '.kemet-footer button, .kemet-footer .kmt-button, .kemet-footer .button, .kemet-footer input#submit, .kemet-footer input[type=“button”], .kemet-footer input[type=“submit”], .kemet-footerinput[type=“reset”]', 'border-radius');

	/*
	 * Woocommerce Shop Archive Custom Width
	 */
	wp.customize('kemet-settings[shop-archive-max-width]', function (setting) {
		setting.bind(function (width) {

			var dynamicStyle = '@media all and ( min-width: 921px ) {';

			dynamicStyle += '.kmt-woo-shop-archive .site-content > .kmt-container{ max-width: ' + (parseInt(width)) + 'px } ';

			if (jQuery('body').hasClass('kmt-fluid-width-layout')) {
				dynamicStyle += '.kmt-woo-shop-archive .site-content > .kmt-container{ padding-left:20px; padding-right:20px; } ';
			}
			dynamicStyle += '}';
			kemet_add_dynamic_css('shop-archive-max-width', dynamicStyle);

		});
	});

	/**
	 * widget background
	 */
	wp.customize('kemet-settings[Widget-bg-color]', function (value) {
		value.bind(function (bg_obj) {

			var dynamicStyle = '.sidebar-main .widget { {{css}} }';

			kemet_background_obj_css(wp.customize, bg_obj, 'Widget-bg-color', dynamicStyle);
		});
	});
	kemet_responsive_spacing('kemet-settings[sidebar-padding]', 'div.sidebar-main', 'padding', ['top', 'bottom', 'right', 'left']);
	/**
	 * sidebar Background
	 */
	kemet_css('kemet-settings[sidebar-text-color]', 'color', '.sidebar-main *');
	kemet_css('kemet-settings[sidebar-link-color', 'color', '.sidebar-main a');
	kemet_css('kemet-settings[sidebar-link-h-color]', 'color', '.sidebar-main a:hover');
	kemet_css('kemet-settings[sidebar-input-color]', 'color', '.sidebar-main input,.sidebar-main input[type="text"],.sidebar-main input[type="email"],.sidebar-main input[type="url"],.sidebar-main input[type="password"],.sidebar-main input[type="reset"],.sidebar-main input[type="search"],.sidebar-main textarea ,.sidebar-main select');
	wp.customize('kemet-settings[sidebar-bg-obj]', function (value) {
		value.bind(function (bg_obj) {

			var dynamicStyle = ' .sidebar-main { {{css}} }';

			kemet_background_obj_css(wp.customize, bg_obj, 'sidebar-bg-obj', dynamicStyle);
		});
	});
	/**
	 * sidebar input backgroundcolor 
	 */
	wp.customize('kemet-settings[sidebar-input-bg-color]', function (value) {
		value.bind(function (bg_obj) {

			var dynamicStyle = '.sidebar-main input,.sidebar-main input[type="text"],.sidebar-main input[type="email"],.sidebar-main input[type="url"],.sidebar-main input[type="password"],.sidebar-main input[type="reset"],.sidebar-main input[type="search"],.sidebar-main textarea ,.sidebar-main select { {{css}} }';

			kemet_background_obj_css(wp.customize, bg_obj, 'sidebar-input-bg-color', dynamicStyle);
		});
	});
	/**
	 * sidebar input border color 
	 */
	wp.customize('kemet-settings[sidebar-input-border-color]', function (value) {
		value.bind(function (border_color) {
			jQuery('.sidebar-main input,.sidebar-main input[type="text"],.sidebar-main input[type="email"],.sidebar-main input[type="url"],.sidebar-main input[type="password"],.sidebar-main input[type="reset"],.sidebar-main input[type="search"],.sidebar-main textarea ,.sidebar-main select').css('border-color', border_color);
		});
	});
	/**
	 * Content Text Color
	 */
	kemet_css('kemet-settings[content-text-color]', 'color', '.entry-content');
	//kemet_css('kemet-settings[post-meta-color]', 'color', 'body:not(.kmt-single-post) .entry-meta * , body:not(.kmt-single-post) .entry-meta');
	wp.customize('kemet-settings[post-meta-color]', function (value) {
		value.bind(function (color) {
			var dynamicStyle = 'body:not(.kmt-single-post) .entry-meta * { color: ' + color + '; } ';
			dynamicStyle += 'body:not(.kmt-single-post) .entry-meta { color: ' + color + '; } ';
			kemet_add_dynamic_css('post-meta-color', dynamicStyle);
		});
	});
	//Content Link Color
	kemet_css('kemet-settings[content-link-color]', 'color', '.entry-content a');
	/**
	 * Content link Hover Color
	 */
	kemet_css('kemet-settings[content-link-h-color]', 'color', '.entry-content a:hover');
	/**
	 * Listing Post 
	 */
	kemet_css('kemet-settings[listing-post-title-color]', 'color', '.content-area .entry-title a');
	kemet_css('kemet-settings[readmore-text-color]', 'color', '.content-area .read-more a');
	kemet_css('kemet-settings[readmore-text-h-color]', 'color', '.content-area .read-more a:hover');
	kemet_responsive_spacing('kemet-settings[readmore-padding]', '.content-area .read-more', 'padding', ['top', 'bottom', 'right', 'left']);

	kemet_css('kemet-settings[readmore-bg-color]', 'background-color', '.content-area .read-more a');
	kemet_css('kemet-settings[readmore-bg-h-color]', 'background-color', '.content-area .read-more a:hover');
	kemet_responsive_slider('kemet-settings[readmore-border-size]', '.content-area .read-more a', 'border-width');

	kemet_responsive_slider('kemet-settings[readmore-border-radius]', '.content-area .read-more a', 'border-radius');

	wp.customize('kemet-settings[readmore-border-color]', function (value) {
		value.bind(function (border_color) {

			var dynamicStyle = '.content-area .read-more a { border-color: ' + border_color + '; } ';

			kemet_add_dynamic_css('readmore-border-color', dynamicStyle);
		});
	});
	wp.customize('kemet-settings[readmore-border-h-color]', function (value) {
		value.bind(function (color) {
			if (color == '') {
				wp.customize.preview.send('refresh');
			}

			if (color) {

				var dynamicStyle = '.content-area .read-more a:hover { border-color: ' + color + '; } ';

				kemet_add_dynamic_css('readmore-border-h-color', dynamicStyle);
			}

		});
	});




})(jQuery);
