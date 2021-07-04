<?php
/**
 * Kemet Add Dynamic Css
 *
 * @package Kemet Theme
 */

if ( ! class_exists( 'Kemet_Header_Off_Canvas_Menu_Dynamic_Css' ) ) {

	/**
	 * Customizer Register
	 */
	class Kemet_Header_Off_Canvas_Menu_Dynamic_Css extends Kemet_Add_Dynamic_Css {

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css css.
		 * @return string
		 */
		public function dynamic_css( $dynamic_css ) {
			if ( Kemet_Builder_Helper::is_item_loaded( 'offcanvas-menu', 'header', 'all' ) ) {

				$prefix                      = 'offcanvas-menu';
				$selector                    = '#' . $prefix;
				$link_bg_color               = kemet_get_option( $prefix . '-link-bg-color' );
				$link_color                  = kemet_get_option( $prefix . '-link-color' );
				$link_border_color           = kemet_get_option( $prefix . '-link-border-color' );
				$link_h_bg_color             = kemet_get_option( $prefix . '-link-h-bg-color' );
				$link_h_color                = kemet_get_option( $prefix . '-link-h-color' );
				$link_h_border_color         = kemet_get_option( $prefix . '-link-h-border-color' );
				$submenu_link_bg_color       = kemet_get_option( $prefix . '-submenu-link-bg-color' );
				$submenu_link_color          = kemet_get_option( $prefix . '-submenu-link-color' );
				$submenu_link_border_color   = kemet_get_option( $prefix . '-submenu-link-border-color' );
				$submenu_link_h_bg_color     = kemet_get_option( $prefix . '-submenu-link-h-bg-color' );
				$submenu_link_h_color        = kemet_get_option( $prefix . '-submenu-link-h-color' );
				$submenu_link_h_border_color = kemet_get_option( $prefix . '-submenu-link-h-border-color' );
				$link_border_width           = kemet_get_option( $prefix . '-border-bottom-width' );
				$link_spacing                = kemet_get_option( $prefix . '-item-spacing' );
				$css_output                  = array(
					$selector => array(
						'--backgroundColor'   => 'transparent',
						'--borderBottomWidth' => kemet_responsive_slider( $link_border_width, 'desktop' ),
						'--headingLinksColor' => kemet_responsive_color( $link_color, 'desktop' ),
						'--backgroundColor'   => 'transparent',
						'--borderBottomColor' => kemet_responsive_color( $link_border_color, 'desktop' ),
						'--linksHoverColor'   => kemet_responsive_color( $link_h_color, 'desktop' ),
					),
					$selector . ' li > .kmt-menu-item-wrap' => array(
						'border-bottom-width' => 'var(--borderBottomWidth)',
						'border-bottom-style' => 'var(----borderBottomStyle, solid)',
						'border-bottom-color' => 'var(--borderBottomColor)',
					),
					$selector . ' li > .kmt-menu-item-wrap' => array(
						'--textColor' => 'var(--headingLinksColor)',
					),
					$selector . ' li > .kmt-menu-item-wrap:hover' => array(
						'--textColor' => 'var(--linksHoverColor)',
					),
					$selector . ' li > .kmt-menu-item-wrap a' => array(
						'color' => 'inherit !important',
					),
					$selector . ' li > a, ' . $selector . ' li > .kmt-menu-item-wrap' => array(
						'--padding'           => kemet_responsive_spacing( $link_spacing, 'all', 'desktop' ),
						'--backgroundColor'   => kemet_responsive_color( $link_bg_color, 'desktop' ),
						'border-bottom-width' => 'var(--borderBottomWidth)',
						'border-bottom-color' => 'var(--borderBottomColor)',
						'background-color'    => 'var(--backgroundColor)',
						'padding'             => 'var(--padding)',
					),
					$selector . ' li > a:hover, ' . $selector . ' li > .kmt-menu-item-wrap:hover' => array(
						'--backgroundColor'   => kemet_responsive_color( $link_h_bg_color, 'desktop' ),
						'--borderBottomColor' => kemet_responsive_color( $link_h_border_color, 'desktop' ),
					),
					$selector . ' > li ul > li > a, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap' => array(
						'--headingLinksColor' => kemet_responsive_color( $submenu_link_color, 'desktop' ),
						'--backgroundColor'   => kemet_responsive_color( $submenu_link_bg_color, 'desktop' ),
						'--borderBottomColor' => kemet_responsive_color( $submenu_link_border_color, 'desktop' ),
						'--linksHoverColor'   => kemet_responsive_color( $submenu_link_h_color, 'desktop' ),
					),
					$selector . ' > li ul > li > a:hover, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap:hover' => array(
						'--backgroundColor'   => kemet_responsive_color( $submenu_link_h_bg_color, 'desktop' ),
						'--borderBottomColor' => kemet_responsive_color( $submenu_link_h_border_color, 'desktop' ),
					),
				);

				/* Parse CSS from array() */
				$parse_css = kemet_parse_css( $css_output );

				$tablet = array(
					$selector => array(
						'--backgroundColor'   => 'transparent',
						'--borderBottomWidth' => kemet_responsive_slider( $link_border_width, 'tablet' ),
						'--headingLinksColor' => kemet_responsive_color( $link_color, 'tablet' ),
						'--borderBottomColor' => kemet_responsive_color( $link_border_color, 'tablet' ),
						'--linksHoverColor'   => kemet_responsive_color( $link_h_color, 'tablet' ),
						'--padding'           => kemet_responsive_spacing( $link_spacing, 'all', 'tablet' ),
					),
					$selector . ' li > a, ' . $selector . ' li > .kmt-menu-item-wrap' => array(
						'--backgroundColor' => kemet_responsive_color( $link_bg_color, 'tablet' ),
					),
					$selector . ' li > a:hover, ' . $selector . ' li > .kmt-menu-item-wrap:hover' => array(
						'--backgroundColor'   => kemet_responsive_color( $link_h_bg_color, 'tablet' ),
						'--borderBottomColor' => kemet_responsive_color( $link_h_border_color, 'tablet' ),
					),
					$selector . ' > li ul > li > a, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap' => array(
						'--headingLinksColor' => kemet_responsive_color( $submenu_link_color, 'tablet' ),
						'--backgroundColor'   => kemet_responsive_color( $submenu_link_bg_color, 'tablet' ),
						'--borderBottomColor' => kemet_responsive_color( $submenu_link_border_color, 'tablet' ),
						'--linksHoverColor'   => kemet_responsive_color( $submenu_link_h_color, 'tablet' ),
					),
					$selector . ' > li ul > li > a:hover, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap:hover' => array(
						'--backgroundColor'   => kemet_responsive_color( $submenu_link_h_bg_color, 'tablet' ),
						'--borderBottomColor' => kemet_responsive_color( $submenu_link_h_border_color, 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector => array(
						'--backgroundColor'   => 'transparent',
						'--borderBottomWidth' => kemet_responsive_slider( $link_border_width, 'mobile' ),
						'--headingLinksColor' => kemet_responsive_color( $link_color, 'mobile' ),
						'--borderBottomColor' => kemet_responsive_color( $link_border_color, 'mobile' ),
						'--linksHoverColor'   => kemet_responsive_color( $link_h_color, 'mobile' ),
						'--padding'           => kemet_responsive_spacing( $link_spacing, 'all', 'mobile' ),
					),
					$selector . ' li > a, ' . $selector . ' li > .kmt-menu-item-wrap' => array(
						'--backgroundColor' => kemet_responsive_color( $link_bg_color, 'mobile' ),
					),
					$selector . ' li > a:hover, ' . $selector . ' li > .kmt-menu-item-wrap:hover' => array(
						'--backgroundColor'   => kemet_responsive_color( $link_h_bg_color, 'mobile' ),
						'--borderBottomColor' => kemet_responsive_color( $link_h_border_color, 'mobile' ),
					),
					$selector . ' > li ul > li > a, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap' => array(
						'--headingLinksColor' => kemet_responsive_color( $submenu_link_color, 'mobile' ),
						'--backgroundColor'   => kemet_responsive_color( $submenu_link_bg_color, 'mobile' ),
						'--borderBottomColor' => kemet_responsive_color( $submenu_link_border_color, 'mobile' ),
						'--linksHoverColor'   => kemet_responsive_color( $submenu_link_h_color, 'mobile' ),
					),
					$selector . ' > li ul > li > a:hover, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap:hover' => array(
						'--backgroundColor'   => kemet_responsive_color( $submenu_link_h_bg_color, 'mobile' ),
						'--borderBottomColor' => kemet_responsive_color( $submenu_link_h_border_color, 'mobile' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $mobile, '', '544' );

				$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( $prefix, $selector );
				$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( $prefix . '-submenu', $selector . ' > li ul > li > a, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap' );

				$dynamic_css .= $parse_css;
			}
			return $dynamic_css;
		}
	}
}

new Kemet_Header_Off_Canvas_Menu_Dynamic_Css();

