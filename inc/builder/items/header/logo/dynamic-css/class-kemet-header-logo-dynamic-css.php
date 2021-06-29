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
						'--fontSize'          => kemet_responsive_slider( $site_title_font_size, 'desktop' ),
						'--headingLinksColor' => esc_attr( $site_title_color ),
						'--linksHoverColor'   => esc_attr( $site_title_h_color ),
						'--letterSpacing'     => kemet_responsive_slider( $site_title_letter_spacing, 'desktop' ),
					),
					'#sitehead .site-logo-img .custom-logo-link img' => array(
						'--logoWidth' => kemet_responsive_slider( $header_logo_width, 'desktop' ),
						'max-width'   => 'var(--logoWidth)',
					),
					'.kemet-logo-svg'                => array(
						'width' => 'var(--logoWidth)',
					),
					/* Site Identity Spacing */
					'.kmt-site-identity'             => array(
						'--padding' => kemet_responsive_spacing( $site_identity_spacing, 'all', 'desktop' ),
					),
					'.site-header .site-description' => array(
						'--textColor'     => esc_attr( $tagline_color ),
						'color'           => 'var(--textColor)',
						'--fontSize'      => kemet_responsive_slider( $site_tagline_font_size, 'desktop' ),
						'--letterSpacing' => kemet_responsive_slider( $tagline_letter_spacing, 'desktop' ),
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
					'.kmt-site-identity'             => array(
						'--padding' => kemet_responsive_spacing( $site_identity_spacing, 'all', 'tablet' ),
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
					'.kmt-site-identity'             => array(
						'--padding' => kemet_responsive_spacing( $site_identity_spacing, 'all', 'mobile' ),
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
