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
				$site_title_color      = kemet_get_sub_option( 'site-title-color', 'initial' );
				$site_title_h_color    = kemet_get_sub_option( 'site-title-color', 'hover' );
				$tagline_color         = kemet_get_sub_option( 'tagline-color', 'initial' );
				$site_identity_spacing = kemet_get_option( 'site-identity-spacing' );
				$site_identity_margin  = kemet_get_option( 'site-identity-margin' );
				$header_logo_width     = kemet_get_option( 'kmt-header-responsive-logo-width' );

				$css_output = array(
					'.custom-mobile-logo'            => array(
						'display' => 'none',
					),
					'.kmt-header-break-point .kmt-mobile-logo .custom-logo-link' => array(
						'display' => 'none',
					),
					'.kmt-header-break-point .kmt-mobile-logo .custom-mobile-logo' => array(
						'display' => 'block',
					),
					'.site-title'                    => array(
						'font-family'       => 'var(--fontFamily)',
						'--linksColor'      => esc_attr( $site_title_color ),
						'--headingColor'    => esc_attr( $site_title_color ),
						'--linksHoverColor' => esc_attr( $site_title_h_color ),
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
						'--padding-top'    => kemet_responsive_spacing( $site_identity_spacing, 'top', 'desktop' ),
						'--padding-left'   => kemet_responsive_spacing( $site_identity_spacing, 'left', 'desktop' ),
						'--padding-bottom' => kemet_responsive_spacing( $site_identity_spacing, 'bottom', 'desktop' ),
						'--padding-right'  => kemet_responsive_spacing( $site_identity_spacing, 'right', 'desktop' ),
						'--margin-top'     => kemet_responsive_spacing( $site_identity_margin, 'top', 'desktop' ),
						'--margin-left'    => kemet_responsive_spacing( $site_identity_margin, 'left', 'desktop' ),
						'--margin-bottom'  => kemet_responsive_spacing( $site_identity_margin, 'bottom', 'desktop' ),
						'--margin-right'   => kemet_responsive_spacing( $site_identity_margin, 'right', 'desktop' ),
					),
					'.site-header .site-description' => array(
						'font-family' => 'var(--fontFamily)',
						'--textColor' => esc_attr( $tagline_color ),
						'color'       => 'var(--textColor)',
					),
				);

				/* Parse CSS from array() */
				$parse_css = kemet_parse_css( $css_output );

				$tablet = array(
					'#sitehead .site-logo-img .custom-logo-link img' => array(
						'max-width' => kemet_responsive_slider( $header_logo_width, 'tablet' ),
					),
					'.kemet-logo-svg'                => array(
						'width' => kemet_responsive_slider( $header_logo_width, 'tablet' ),
					),
					/* Site Identity Spacing */
					'.kmt-site-identity'             => array(
						'--padding-top'    => kemet_responsive_spacing( $site_identity_spacing, 'top', 'tablet' ),
						'--padding-left'   => kemet_responsive_spacing( $site_identity_spacing, 'left', 'tablet' ),
						'--padding-bottom' => kemet_responsive_spacing( $site_identity_spacing, 'bottom', 'tablet' ),
						'--padding-right'  => kemet_responsive_spacing( $site_identity_spacing, 'right', 'tablet' ),
						'--margin-top'     => kemet_responsive_spacing( $site_identity_margin, 'top', 'tablet' ),
						'--margin-left'    => kemet_responsive_spacing( $site_identity_margin, 'left', 'tablet' ),
						'--margin-bottom'  => kemet_responsive_spacing( $site_identity_margin, 'bottom', 'tablet' ),
						'--margin-right'   => kemet_responsive_spacing( $site_identity_margin, 'right', 'tablet' ),
					),
					'.site-header .site-description' => array(
						'color' => esc_attr( $tagline_color ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					'#sitehead .site-logo-img .custom-logo-link img' => array(
						'max-width' => kemet_responsive_slider( $header_logo_width, 'mobile' ),
					),
					'.kemet-logo-svg'                => array(
						'width' => kemet_responsive_slider( $header_logo_width, 'mobile' ),
					),
					/* Site Identity Spacing */
					'.kmt-site-identity'             => array(
						'--padding-top'    => kemet_responsive_spacing( $site_identity_spacing, 'top', 'mobile' ),
						'--padding-left'   => kemet_responsive_spacing( $site_identity_spacing, 'left', 'mobile' ),
						'--padding-bottom' => kemet_responsive_spacing( $site_identity_spacing, 'bottom', 'mobile' ),
						'--padding-right'  => kemet_responsive_spacing( $site_identity_spacing, 'right', 'mobile' ),
						'--margin-top'     => kemet_responsive_spacing( $site_identity_margin, 'top', 'mobile' ),
						'--margin-left'    => kemet_responsive_spacing( $site_identity_margin, 'left', 'mobile' ),
						'--margin-bottom'  => kemet_responsive_spacing( $site_identity_margin, 'bottom', 'mobile' ),
						'--margin-right'   => kemet_responsive_spacing( $site_identity_margin, 'right', 'mobile' ),
					),
					'.site-header .site-description' => array(
						'color' => esc_attr( $tagline_color ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css   .= kemet_parse_css( $mobile, '', '544' );
				$parse_css   .= Kemet_Dynamic_Css_Generator::typography_css( 'site-title', '.site-title' );
				$parse_css   .= Kemet_Dynamic_Css_Generator::typography_css( 'tagline', '.site-header .site-description' );
				$dynamic_css .= $parse_css;
			}
			return $dynamic_css;
		}
	}
}

new Kemet_Header_Logo_Dynamic_Css();

