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
				$theme_color          = kemet_get_option( 'theme-color' );
				$headings_links_color = kemet_get_option( 'headings-links-color' );
				$global_border_color  = kemet_get_option( 'global-border-color' );

				$prefix                      = 'offcanvas-menu';
				$selector                    = '#' . $prefix;
				$link_bg_color               = kemet_get_option( $prefix . '-link-bg-color' );
				$link_color                  = kemet_get_option( $prefix . '-link-color', Kemet_Customizer::responsive_default_value( $headings_links_color ) );
				$link_border_color           = kemet_get_option( $prefix . '-link-border-color', Kemet_Customizer::responsive_default_value( $global_border_color ) );
				$link_h_bg_color             = kemet_get_option( $prefix . '-link-h-bg-color' );
				$link_h_color                = kemet_get_option( $prefix . '-link-h-color', Kemet_Customizer::responsive_default_value( $theme_color ) );
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
					$selector . ' li > a, ' . $selector . ' li > .kmt-menu-item-wrap' => array(
						'border-bottom-style' => esc_attr( 'solid' ),
						'border-bottom-width' => kemet_responsive_slider( $link_border_width, 'desktop' ),
						'color'               => kemet_responsive_color( $link_color, 'desktop' ),
						'background-color'    => kemet_responsive_color( $link_bg_color, 'desktop' ),
						'border-color'        => kemet_responsive_color( $link_border_color, 'desktop' ),
					),
					$selector . ' li > a:hover, ' . $selector . ' li > .kmt-menu-item-wrap:hover' => array(
						'color'            => kemet_responsive_color( $link_h_color, 'desktop' ),
						'background-color' => kemet_responsive_color( $link_h_bg_color, 'desktop' ),
						'border-color'     => kemet_responsive_color( $link_h_border_color, 'desktop' ),
					),
					$selector . ' > li ul > li > a, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap' => array(
						'color'            => kemet_responsive_color( $submenu_link_color, 'desktop' ),
						'background-color' => kemet_responsive_color( $submenu_link_bg_color, 'desktop' ),
						'border-color'     => kemet_responsive_color( $submenu_link_border_color, 'desktop' ),
					),
					$selector . ' > li ul > li > a:hover, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap:hover' => array(
						'color'            => kemet_responsive_color( $submenu_link_h_color, 'desktop' ),
						'background-color' => kemet_responsive_color( $submenu_link_h_bg_color, 'desktop' ),
						'border-color'     => kemet_responsive_color( $submenu_link_h_border_color, 'desktop' ),
					),
				);

				/* Parse CSS from array() */
				$parse_css = kemet_parse_css( $css_output );

				$tablet = array(
					$selector . ' li > a, ' . $selector . ' li > .kmt-menu-item-wrap' => array(
						'border-bottom-width' => kemet_responsive_slider( $link_border_width, 'tablet' ),
						'color'               => kemet_responsive_color( $link_color, 'tablet' ),
						'background-color'    => kemet_responsive_color( $link_bg_color, 'tablet' ),
						'border-color'        => kemet_responsive_color( $link_border_color, 'tablet' ),
					),
					$selector . ' li > a:hover, ' . $selector . ' li > .kmt-menu-item-wrap:hover' => array(
						'color'            => kemet_responsive_color( $link_h_color, 'tablet' ),
						'background-color' => kemet_responsive_color( $link_h_bg_color, 'tablet' ),
						'border-color'     => kemet_responsive_color( $link_h_border_color, 'tablet' ),
					),
					$selector . ' > li ul > li > a, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap' => array(
						'color'            => kemet_responsive_color( $submenu_link_color, 'tablet' ),
						'background-color' => kemet_responsive_color( $submenu_link_bg_color, 'tablet' ),
						'border-color'     => kemet_responsive_color( $submenu_link_border_color, 'tablet' ),
					),
					$selector . ' > li ul > li > a:hover, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap:hover' => array(
						'color'            => kemet_responsive_color( $submenu_link_h_color, 'tablet' ),
						'background-color' => kemet_responsive_color( $submenu_link_h_bg_color, 'tablet' ),
						'border-color'     => kemet_responsive_color( $submenu_link_h_border_color, 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector . ' li > a, ' . $selector . ' li > .kmt-menu-item-wrap' => array(
						'border-bottom-width' => kemet_responsive_slider( $link_border_width, 'mobile' ),
						'color'               => kemet_responsive_color( $link_color, 'mobile' ),
						'background-color'    => kemet_responsive_color( $link_bg_color, 'mobile' ),
						'border-color'        => kemet_responsive_color( $link_border_color, 'mobile' ),
					),
					$selector . ' li > a:hover, ' . $selector . ' li > .kmt-menu-item-wrap:hover' => array(
						'color'            => kemet_responsive_color( $link_h_color, 'mobile' ),
						'background-color' => kemet_responsive_color( $link_h_bg_color, 'mobile' ),
						'border-color'     => kemet_responsive_color( $link_h_border_color, 'mobile' ),
					),
					$selector . ' > li ul > li > a, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap' => array(
						'color'            => kemet_responsive_color( $submenu_link_color, 'mobile' ),
						'background-color' => kemet_responsive_color( $submenu_link_bg_color, 'mobile' ),
						'border-color'     => kemet_responsive_color( $submenu_link_border_color, 'mobile' ),
					),
					$selector . ' > li ul > li > a:hover, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap:hover' => array(
						'color'            => kemet_responsive_color( $submenu_link_h_color, 'mobile' ),
						'background-color' => kemet_responsive_color( $submenu_link_h_bg_color, 'mobile' ),
						'border-color'     => kemet_responsive_color( $submenu_link_h_border_color, 'mobile' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $mobile, '', '544' );

				$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( $prefix, $selector . ' li > a, ' . $selector . ' li > .kmt-menu-item-wrap' );
				$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( $prefix . '-submenu', $selector . ' > li ul > li > a, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap' );

				$dynamic_css .= $parse_css;
			}
			return $dynamic_css;
		}
	}
}

new Kemet_Header_Off_Canvas_Menu_Dynamic_Css();

