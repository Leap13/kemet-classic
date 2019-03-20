/**
 * Customizer controls toggles
 *
 * @package Kemet
 */

( function( $ ) {

	/* Internal shorthand */
	var api = wp.customize;

	/**
	 * Trigger hooks
	 */
	KMTControlTrigger = {

	    /**
	     * Trigger a hook.
	     *
	     * @method triggerHook
	     * @param {String} hook The hook to trigger.
	     * @param {Array} args An array of args to pass to the hook.
		 */
	    triggerHook: function( hook, args )
	    {
	    	$( 'body' ).trigger( 'kemet-control-trigger.' + hook, args );
	    },

	    /**
	     * Add a hook.
	     *
	     * @method addHook
	     * @param {String} hook The hook to add.
	     * @param {Function} callback A function to call when the hook is triggered.
	     */
	    addHook: function( hook, callback )
	    {
	    	$( 'body' ).on( 'kemet-control-trigger.' + hook, callback );
	    },

	    /**
	     * Remove a hook.
	     *
	     * @method removeHook
	     * @param {String} hook The hook to remove.
	     * @param {Function} callback The callback function to remove.
	     */
	    removeHook: function( hook, callback )
	    {
		    $( 'body' ).off( 'kemet-control-trigger.' + hook, callback );
	    },
	};

	/**
	 * Helper class that contains data for showing and hiding controls.
	 *
	 * @class KMTCustomizerToggles
	 */
	KMTCustomizerToggles = {

		'kemet-settings[display-site-title]' :
		[
			{
				controls: [
					'kemet-settings[divider-section-header-typo-title]',
					'kemet-settings[font-size-site-title]',
				],
				callback: function( value ) {

					if ( value ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'kemet-settings[logo-title-inline]',
				],
				callback: function( value ) {

					var site_tagline = api( 'kemet-settings[display-site-tagline]' ).get();
					var has_custom_logo = api( 'custom_logo' ).get();
					var has_retina_logo = api( 'kemet-settings[kmt-header-retina-logo]' ).get();

					if ( ( value || site_tagline ) && ( has_custom_logo || has_retina_logo ) ) {
						return true;
					}
					return false;
				}
			},
		],

		'kemet-settings[display-site-tagline]' :
		[
			{
				controls: [
					'kemet-settings[divider-section-header-typo-tagline]',
					'kemet-settings[font-size-site-tagline]',
				],
				callback: function( value ) {

					if ( value ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'kemet-settings[logo-title-inline]',
				],
				callback: function( value ) {

					var site_title = api( 'kemet-settings[display-site-title]' ).get();
					var has_custom_logo = api( 'custom_logo' ).get();
					var has_retina_logo = api( 'kemet-settings[kmt-header-retina-logo]' ).get();

					if ( ( value || site_title ) && ( has_custom_logo || has_retina_logo ) ) {
						return true;
					}
					return false;
				}
			},
		],

		'kemet-settings[kmt-header-retina-logo]' :
		[
			{
				controls: [
					'kemet-settings[logo-title-inline]',
				],
				callback: function( value ) {

					var has_custom_logo = api( 'custom_logo' ).get();
					var site_tagline = api( 'kemet-settings[display-site-tagline]' ).get();
					var site_title = api( 'kemet-settings[display-site-title]' ).get();

					if ( ( value || has_custom_logo ) && ( site_title || site_tagline ) ) {
						return true;
					}
					return false;
				}
			},
		],

		'custom_logo' :
		[
			{
				controls: [
					'kemet-settings[logo-title-inline]',
				],
				callback: function( value ) {

					var has_retina_logo = api( 'kemet-settings[kmt-header-retina-logo]' ).get();
					var site_tagline = api( 'kemet-settings[display-site-tagline]' ).get();
					var site_title = api( 'kemet-settings[display-site-title]' ).get();

					if ( ( value || has_retina_logo ) && ( site_title || site_tagline ) ) {
						return true;
					}
					return false;
				}
			},
		],

		/**
		 * Section - Header
		 *
		 * @link  ?autofocus[section]=section-header
		 */

		/**
		 * Layout 2
		 */
		// Layout 2 > Right Section > Text / HTML
		// Layout 2 > Right Section > Search Type
		// Layout 2 > Right Section > Search Type > Search Box Type.
		'kemet-settings[header-main-rt-section]' :
		[
			{
				controls: [
					'kemet-settings[header-main-rt-section-html]'
				],
				callback: function( val ) {

					if ( 'text-html' == val ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'kemet-settings[header-main-menu-label]',
					'kemet-settings[header-main-menu-label-divider]',
				],
				callback: function( custom_menu ) {
					var menu = api( 'kemet-settings[disable-primary-nav]' ).get();
					if ( !menu || 'none' !=  custom_menu) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'kemet-settings[header-display-outside-menu]',
				],
				callback: function( custom_menu ) {
					
					if ( 'none' !=  custom_menu ) {
						return true;
					}
					return false;
				}
			}
		],

		/**
		 * Blog
		 */
		'kemet-settings[blog-width]' :
		[
			{
				controls: [
					'kemet-settings[blog-max-width]'
				],
				callback: function( blog_width ) {

					if ( 'custom' == blog_width ) {
						return true;
					}
					return false;
				}
		}
		],
		'kemet-settings[blog-post-structure]' :
		[
			{
				controls: [
					'kemet-settings[blog-meta]',
				],
				callback: function( blog_structure ) {
					if ( jQuery.inArray ( "title-meta", blog_structure ) !== -1 ) {
						return true;
					}
					return false;
				}
			}
		],

		/**
		 * Blog Single
		 */
		 'kemet-settings[blog-single-post-structure]' :
		[
			{
				controls: [
					'kemet-settings[blog-single-meta]',
				],
				callback: function( blog_structure ) {
					if ( jQuery.inArray ( "single-title-meta", blog_structure ) !== -1 ) {
						return true;
					}
					return false;
				}
			}
		],
		'kemet-settings[blog-single-width]' :
		[
			{
				controls: [
					'kemet-settings[blog-single-max-width]'
				],
				callback: function( blog_width ) {

					if ( 'custom' == blog_width ) {
						return true;
					}
					return false;
				}
		}
		],
		'kemet-settings[blog-single-meta]' :
		[
			{
				controls: [	
					'kemet-settings[blog-single-meta-author]',
					'kemet-settings[blog-single-meta-cat]',
					'kemet-settings[blog-single-meta-date]',
					'kemet-settings[blog-single-meta-comments]',
					'kemet-settings[blog-single-meta-tag]',
				],
				callback: function( enable_postmeta ) {

					if ( '1' == enable_postmeta ) {
						return true;
					}
					return false;
				}
		}
		],

		/**
		 * Small Footer
		 */
		'kemet-settings[copyright-footer-layout]' :
		[
			{
				controls: [
					'kemet-settings[footer-copyright-section-1]',
					'kemet-settings[footer-copyright-section-2]',
					'kemet-settings[section-kmt-footer-copyright-background-styling]',
					'kemet-settings[kmt-footer-copyright-color]',
					'kemet-settings[kmt-footer-copyright-link-color]',
					'kemet-settings[kmt-footer-copyright-link-hover-color]',
					'kemet-settings[kmt-footer-copyright-bg-img]',
					'kemet-settings[kmt-footer-copyright-text-font]',
					'kemet-settings[footer-copyright-font-size]',
					'kemet-settings[footer-copyright-divider]',
					'kemet-settings[footer-layout-width]',
					'kemet-settings[footer-color]',
					'kemet-settings[footer-link-color]',
					'kemet-settings[footer-link-h-color]',
					'kemet-settings[footer-bg-obj]',
					'kemet-settings[divider-footer-image]',
				],
				callback: function( copyright_footer_layout ) {

					if ( 'disabled' != copyright_footer_layout ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'kemet-settings[footer-copyright-section-1-credit]',
				],
				callback: function( copyright_footer_layout ) {

					var footer_section_1 = api( 'kemet-settings[footer-copyright-section-1]' ).get();

					if ( 'disabled' != copyright_footer_layout && 'custom' == footer_section_1 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'kemet-settings[footer-copyright-section-2-credit]',
				],
				callback: function( copyright_footer_layout ) {

					var footer_section_2 = api( 'kemet-settings[footer-copyright-section-2]' ).get();

					if ( 'disabled' != copyright_footer_layout && 'custom' == footer_section_2 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'kemet-settings[footer-copyright-divider-color]',
				],
				callback: function( copyright_footer_layout ) {

					var border_width = api( 'kemet-settings[footer-copyright-divider]' ).get();

					if ( '1' <= border_width && 'disabled' != copyright_footer_layout ) {
						return true;
					}
					return false;
				}
			},
		],
		'kemet-settings[footer-copyright-section-1]' :
		[
			{
				controls: [
					'kemet-settings[footer-copyright-section-1-credit]',
				],
				callback: function( enabled_section_1 ) {

					var footer_layout = api( 'kemet-settings[copyright-footer-layout]' ).get();

					if ( 'custom' == enabled_section_1 && 'disabled' != footer_layout ) {
						return true;
					}
					return false;
				}
			}
		],
		'kemet-settings[footer-copyright-section-2]' :
		[
			{
				controls: [
					'kemet-settings[footer-copyright-section-2-credit]',
				],
				callback: function( enabled_section_2 ) {

					var footer_layout = api( 'kemet-settings[copyright-footer-layout]' ).get();

					if ( 'custom' == enabled_section_2 && 'disabled' != footer_layout ) {
						return true;
					}
					return false;
				}
			}
		],

		'kemet-settings[footer-copyright-divider]' :
		[
			{
				controls: [
					'kemet-settings[footer-copyright-divider-color]',
				],
				callback: function( border_width ) {

					var footer_layout = api( 'kemet-settings[copyright-footer-layout]' ).get();

					if ( '1' <= border_width && 'disabled' != footer_layout ) {
						return true;
					}
					return false;
				}
			},
		],

		'kemet-settings[header-main-sep]' :
		[
			{
				controls: [
					'kemet-settings[header-main-sep-color]',
				],
				callback: function( border_width ) {

					if ( '1' <= border_width ) {
						return true;
					}
					return false;
				}
			},
		],

		'kemet-settings[disable-primary-nav]' :
		[
			{
				controls: [
					'kemet-settings[header-main-menu-label]',
					'kemet-settings[header-main-menu-label-divider]',
				],
				callback: function( menu ) {
					var custom_menu = api( 'kemet-settings[header-main-rt-section]' ).get();
					if ( !menu || 'none' !=  custom_menu) {
						return true;
					}
					return false;
				}
			},
		],



		/**
		 * Footer Widgets
		 */
		'kemet-settings[kemet-footer]' :
		[
			{
				controls: [
					'kemet-settings[kemet-footer-background-divider]',
					'kemet-settings[kemet-footer-wgt-title-color]',
					'kemet-settings[kemet-footer-text-color]',
					'kemet-settings[kemet-footer-link-color]',
					'kemet-settings[kemet-footer-link-h-color]',
					'kemet-settings[kemet-footer-bg-obj]',
				],
				callback: function( footer_widget_area ) {

					if ( 'disabled' != footer_widget_area ) {
						return true;
					}
					return false;
				}
			},
		],
		'kemet-settings[shop-archive-width]' :
		[
			{
				controls: [
					'kemet-settings[shop-archive-max-width]'
				],
				callback: function( blog_width ) {

					if ( 'custom' == blog_width ) {
						return true;
					}
					return false;
				}
			}
		],
	};
} )( jQuery );