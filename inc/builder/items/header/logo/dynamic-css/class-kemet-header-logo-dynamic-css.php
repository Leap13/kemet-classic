<?php
/**
 * Kemet Add Dynamic Css
 *
 * @package Kemet Theme
 */

if ( ! class_exists( 'Kemet_Header_Logo_Dynamic_Css' ) ) {

	/**
	 * Customizer Register
	 */
	class Kemet_Header_Logo_Dynamic_Css extends Kemet_Add_Dynamic_Css {

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css css.
		 * @return string
		 */
		public function dynamic_css( $dynamic_css ) {
			if ( Kemet_Builder_Helper::is_item_loaded( 'logo', 'header', 'all' ) ) {
				$site_title_font_size      = kemet_get_option( 'site-title-font-size' );
				$site_title_color          = kemet_get_option( 'site-title-color' );
				$site_title_h_color        = kemet_get_option( 'site-title-h-color' );
				$tagline_color             = kemet_get_option( 'tagline-color' );
				$site_tagline_font_size    = kemet_get_option( 'font-size-site-tagline' );
				$site_title_letter_spacing = kemet_get_option( 'site-title-letter-spacing' );
				$tagline_letter_spacing    = kemet_get_option( 'tagline-letter-spacing' );
				$site_identity_spacing     = kemet_get_option( 'site-identity-spacing' );
				$header_logo_width         = kemet_get_option( 'kmt-header-responsive-logo-width' );

				$css_output = array(
					'.site-title'                    => array(
						'font-size' => kemet_responsive_slider( $site_title_font_size, 'desktop' ),
					),
					'.site-title a'                  => array(
						'color'          => esc_attr( $site_title_color ),
						'letter-spacing' => kemet_responsive_slider( $site_title_letter_spacing, 'desktop' ),
					),
					'.site-title a:hover'            => array(
						'color' => esc_attr( $site_title_h_color ),
					),
					'#sitehead .site-logo-img .custom-logo-link img' => array(
						'max-width' => kemet_responsive_slider( $header_logo_width, 'desktop' ),
					),
					'.kemet-logo-svg'                => array(
						'width' => kemet_responsive_slider( $header_logo_width, 'desktop' ),
					),
					/* Site Identity Spacing */
					'#sitehead.site-header:not(.kmt-is-sticky) .kmt-site-identity' => array(
						'padding-top'    => kemet_responsive_spacing( $site_identity_spacing, 'top', 'desktop' ),
						'padding-right'  => kemet_responsive_spacing( $site_identity_spacing, 'right', 'desktop' ),
						'padding-bottom' => kemet_responsive_spacing( $site_identity_spacing, 'bottom', 'desktop' ),
						'padding-left'   => kemet_responsive_spacing( $site_identity_spacing, 'left', 'desktop' ),
					),
					'.site-header .site-description' => array(
						'color'          => esc_attr( $tagline_color ),
						'font-size'      => kemet_responsive_slider( $site_tagline_font_size, 'desktop' ),
						'letter-spacing' => kemet_responsive_slider( $tagline_letter_spacing, 'desktop' ),
					),
				);

				/* Parse CSS from array() */
				$parse_css = kemet_parse_css( $css_output );

				$tablet = array(
					'.site-title'                    => array(
						'font-size' => kemet_responsive_slider( $site_title_font_size, 'tablet' ),
					),
					'.site-title a'                  => array(
						'letter-spacing' => kemet_responsive_slider( $site_title_letter_spacing, 'tablet' ),
					),
					'#sitehead .site-logo-img .custom-logo-link img' => array(
						'max-width' => kemet_responsive_slider( $header_logo_width, 'tablet' ),
					),
					'.kemet-logo-svg'                => array(
						'width' => kemet_responsive_slider( $header_logo_width, 'tablet' ),
					),
					/* Site Identity Spacing */
					'#sitehead.site-header:not(.kmt-is-sticky) .kmt-site-identity' => array(
						'padding-top'    => kemet_responsive_spacing( $site_identity_spacing, 'top', 'tablet' ),
						'padding-right'  => kemet_responsive_spacing( $site_identity_spacing, 'right', 'tablet' ),
						'padding-bottom' => kemet_responsive_spacing( $site_identity_spacing, 'bottom', 'tablet' ),
						'padding-left'   => kemet_responsive_spacing( $site_identity_spacing, 'left', 'tablet' ),
					),
					'.site-header .site-description' => array(
						'color'          => esc_attr( $tagline_color ),
						'font-size'      => kemet_responsive_slider( $site_tagline_font_size, 'tablet' ),
						'letter-spacing' => kemet_responsive_slider( $tagline_letter_spacing, 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					'.site-title'                    => array(
						'font-size' => kemet_responsive_slider( $site_title_font_size, 'mobile' ),
					),
					'.site-title a'                  => array(
						'letter-spacing' => kemet_responsive_slider( $site_title_letter_spacing, 'mobile' ),
					),
					'#sitehead .site-logo-img .custom-logo-link img' => array(
						'max-width' => kemet_responsive_slider( $header_logo_width, 'mobile' ),
					),
					'.kemet-logo-svg'                => array(
						'width' => kemet_responsive_slider( $header_logo_width, 'mobile' ),
					),
					/* Site Identity Spacing */
					'#sitehead.site-header:not(.kmt-is-sticky) .kmt-site-identity' => array(
						'padding-top'    => kemet_responsive_spacing( $site_identity_spacing, 'top', 'mobile' ),
						'padding-right'  => kemet_responsive_spacing( $site_identity_spacing, 'right', 'mobile' ),
						'padding-bottom' => kemet_responsive_spacing( $site_identity_spacing, 'bottom', 'mobile' ),
						'padding-left'   => kemet_responsive_spacing( $site_identity_spacing, 'left', 'mobile' ),
					),
					'.site-header .site-description' => array(
						'color'          => esc_attr( $tagline_color ),
						'font-size'      => kemet_responsive_slider( $site_tagline_font_size, 'mobile' ),
						'letter-spacing' => kemet_responsive_slider( $tagline_letter_spacing, 'mobile' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $mobile, '', '544' );

				$dynamic_css .= $parse_css;
			}
			return $dynamic_css;
		}
	}
}

new Kemet_Header_Logo_Dynamic_Css();

