<?php
/**
 * Kemet Add Dynamic Css
 *
 * @package Kemet Theme
 */

if ( ! class_exists( 'Kemet_Header_Menu_Dynamic_Css' ) ) {

	/**
	 * Customizer Register
	 */
	class Kemet_Header_Menu_Dynamic_Css extends Kemet_Add_Dynamic_Css {

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css css.
		 * @return string
		 */
		public function dynamic_css( $dynamic_css ) {
			$header_menus = apply_filters( 'kemet_header_menu_items', array( 'primary-menu', 'secondary-menu' ) );

			foreach ( $header_menus as $menu ) {
				if ( ! Kemet_Builder_Helper::is_item_loaded( $menu, 'header', 'all' ) ) {
					continue;
				}
				$theme_color          = kemet_get_option( 'theme-color' );
				$headings_links_color = kemet_get_option( 'headings-links-color' );
				$global_border_color  = kemet_get_option( 'global-border-color' );

				$prefix                       = $menu;
				$selector                     = '#' . $prefix;
				$bg_color                     = kemet_get_option( $prefix . '-bg-color' );
				$link_color                   = kemet_get_option( $prefix . '-link-color', $headings_links_color );
				$link_h_color                 = kemet_get_option( $prefix . '-link-h-color', $theme_color );
				$link_h_border_color          = kemet_get_option( $prefix . '-link-h-border-color', $link_h_color );
				$link_active_bg_color         = kemet_get_option( $prefix . '-link-active-bg-color' );
				$link_active_color            = kemet_get_option( $prefix . '-link-active-color' );
				$link_active_border_radius    = kemet_get_option( $prefix . '-link-active-border-radius' );
				$link_h_border_width          = kemet_get_option( $prefix . '-link-bottom-border-width-hover' );
				$menu_spacing                 = kemet_get_option( $prefix . '-spacing' );
				$menu_link_spacing            = kemet_get_option( $prefix . '-item-spacing' );
				$line_height                  = kemet_get_option( $prefix . '-line-height' );
				$submenu_width                = kemet_get_option( $prefix . '-submenu-width' );
				$submenu_bg_color             = kemet_get_option( $prefix . '-submenu-bg-color' );
				$submenu_link_color           = kemet_get_option( $prefix . '-submenu-link-color' );
				$submenu_top_border_color     = kemet_get_option( $prefix . '-submenu-border-top-color', $global_border_color );
				$submenu_link_h_color         = kemet_get_option( $prefix . '-submenu-link-h-color' );
				$submenu_bg_h_color           = kemet_get_option( $prefix . '-submenu-h-bg-color' );
				$submenu_link_separator_color = kemet_get_option( $prefix . '-submenu-link-separator-color', $global_border_color );
				$submenu_border_top_width     = kemet_get_option( $prefix . '-submenu-border-top-width' );

				$css_output = array(
					$selector                             => array(
						'background-color' => esc_attr( $bg_color ),
						'padding-top'      => kemet_responsive_spacing( $menu_spacing, 'top', 'desktop' ),
						'padding-right'    => kemet_responsive_spacing( $menu_spacing, 'right', 'desktop' ),
						'padding-bottom'   => kemet_responsive_spacing( $menu_spacing, 'bottom', 'desktop' ),
						'padding-left'     => kemet_responsive_spacing( $menu_spacing, 'left', 'desktop' ),
					),
					$selector . ' > li'                   => array(
						'line-height' => kemet_responsive_slider( $line_height, 'desktop' ),
					),
					$selector . ' > li > a'               => array(
						'color'               => esc_attr( $link_color ),
						'border-bottom-width' => kemet_responsive_slider( $link_h_border_width, 'desktop' ),
						'padding-top'         => kemet_responsive_spacing( $menu_link_spacing, 'top', 'desktop' ),
						'padding-right'       => kemet_responsive_spacing( $menu_link_spacing, 'right', 'desktop' ),
						'padding-bottom'      => kemet_responsive_spacing( $menu_link_spacing, 'bottom', 'desktop' ),
						'padding-left'        => kemet_responsive_spacing( $menu_link_spacing, 'left', 'desktop' ),
					),
					$selector . ' > li > a:hover'         => array(
						'color'               => esc_attr( $link_h_color ),
						'border-bottom-color' => esc_attr( $link_h_border_color ),
					),
					$selector . ' > .current-menu-item > a, ' . $selector . ' > .current-menu-ancestor > a, ' . $selector . ' > .current_page_item > a' => array(
						'color'            => esc_attr( $link_active_color ),
						'background-color' => esc_attr( $link_active_bg_color ),
					),
					$selector . ' > li ul'                => array(
						'width'            => kemet_get_css_value( $submenu_width, 'px' ),
						'background-color' => esc_attr( $submenu_bg_color ),
						'border-top-width' => kemet_get_css_value( $submenu_border_top_width, 'px' ),
						'border-top-color' => esc_attr( $submenu_top_border_color ),
					),
					$selector . ' > li ul > li > a'       => array(
						'color'               => esc_attr( $submenu_link_color ),
						'background-color'    => esc_attr( $submenu_bg_color ),
						'border-bottom-width' => esc_attr( '1px' ),
						'border-bottom-style' => esc_attr( 'solid' ),
						'border-bottom-color' => esc_attr( $submenu_link_separator_color ),
					),
					$selector . ' > li ul > li > a:hover' => array(
						'color'            => esc_attr( $submenu_link_h_color ),
						'background-color' => esc_attr( $submenu_bg_h_color ),
					),
				);

				/* Parse CSS from array() */
				$parse_css = kemet_parse_css( $css_output );

				$tablet = array(
					$selector               => array(
						'padding-top'    => kemet_responsive_spacing( $menu_spacing, 'top', 'tablet' ),
						'padding-right'  => kemet_responsive_spacing( $menu_spacing, 'right', 'tablet' ),
						'padding-bottom' => kemet_responsive_spacing( $menu_spacing, 'bottom', 'tablet' ),
						'padding-left'   => kemet_responsive_spacing( $menu_spacing, 'left', 'tablet' ),
					),
					$selector . ' > li > a' => array(
						'border-bottom-width' => kemet_responsive_slider( $link_h_border_width, 'tablet' ),
						'padding-top'         => kemet_responsive_spacing( $menu_link_spacing, 'top', 'tablet' ),
						'padding-right'       => kemet_responsive_spacing( $menu_link_spacing, 'right', 'tablet' ),
						'padding-bottom'      => kemet_responsive_spacing( $menu_link_spacing, 'bottom', 'tablet' ),
						'padding-left'        => kemet_responsive_spacing( $menu_link_spacing, 'left', 'tablet' ),
					),
					$selector . ' > .current-menu-item > a, ' . $selector . ' .current-menu-ancestor > a, ' . $selector . ' .current_page_item > a' => array(
						'border-radius' => kemet_responsive_slider( $link_active_border_radius, 'tablet' ),
					),
					$selector . ' > li'     => array(
						'line-height' => kemet_responsive_slider( $line_height, 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector               => array(
						'padding-top'    => kemet_responsive_spacing( $menu_spacing, 'top', 'mobile' ),
						'padding-right'  => kemet_responsive_spacing( $menu_spacing, 'right', 'mobile' ),
						'padding-bottom' => kemet_responsive_spacing( $menu_spacing, 'bottom', 'mobile' ),
						'padding-left'   => kemet_responsive_spacing( $menu_spacing, 'left', 'mobile' ),
					),
					$selector . ' > li > a' => array(
						'border-bottom-width' => kemet_responsive_slider( $link_h_border_width, 'mobile' ),
						'padding-top'         => kemet_responsive_spacing( $menu_link_spacing, 'top', 'mobile' ),
						'padding-right'       => kemet_responsive_spacing( $menu_link_spacing, 'right', 'mobile' ),
						'padding-bottom'      => kemet_responsive_spacing( $menu_link_spacing, 'bottom', 'mobile' ),
						'padding-left'        => kemet_responsive_spacing( $menu_link_spacing, 'left', 'mobile' ),
					),
					$selector . ' > .current-menu-item > a, ' . $selector . ' > .current-menu-ancestor > a, ' . $selector . ' > .current_page_item > a' => array(
						'border-radius' => kemet_responsive_slider( $link_active_border_radius, 'mobile' ),
					),
					$selector . ' > li'     => array(
						'line-height' => kemet_responsive_slider( $line_height, 'mobile' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $mobile, '', '544' );

				$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( $prefix, $selector . ' > li > a' );
				$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( $prefix . '-submenu', $selector . ' > li ul > li > a' );

				$dynamic_css .= $parse_css;
			}
			return $dynamic_css;
		}
	}
}

new Kemet_Header_Menu_Dynamic_Css();


