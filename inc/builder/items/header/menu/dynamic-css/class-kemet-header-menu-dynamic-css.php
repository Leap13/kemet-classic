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
				$prefix                       = $menu;
				$selector                     = has_nav_menu( $menu ) ? '#' . $prefix : '#' . $prefix . ' > ul';
				$bg_color                     = kemet_get_sub_option( $prefix . '-bg-color', 'initial' );
				$link_color                   = kemet_get_sub_option( $prefix . '-link-color', 'initial' );
				$link_h_color                 = kemet_get_sub_option( $prefix . '-link-color', 'hover' );
				$link_h_border_color          = kemet_get_sub_option( $prefix . '-link-h-border-color', 'initial' );
				$link_active_bg_color         = kemet_get_sub_option( $prefix . '-link-active-bg-color', 'initial' );
				$link_active_color            = kemet_get_sub_option( $prefix . '-link-color', 'active' );
				$link_active_border_radius    = kemet_get_option( $prefix . '-link-active-border-radius' );
				$link_h_border_width          = kemet_get_option( $prefix . '-link-bottom-border-width-hover' );
				$menu_spacing                 = kemet_get_option( $prefix . '-spacing' );
				$menu_link_spacing            = kemet_get_option( $prefix . '-item-spacing' );
				$submenu_width                = kemet_get_option( $prefix . '-submenu-width' );
				$submenu_bg_color             = kemet_get_sub_option( $prefix . '-submenu-bg-color', 'initial' );
				$submenu_link_color           = kemet_get_sub_option( $prefix . '-submenu-link-color', 'initial' );
				$submenu_top_border_color     = kemet_get_sub_option( $prefix . '-submenu-border-top-color', 'initial' );
				$submenu_link_h_color         = kemet_get_sub_option( $prefix . '-submenu-link-color', 'hover' );
				$submenu_bg_h_color           = kemet_get_sub_option( $prefix . '-submenu-bg-color', 'hover' );
				$submenu_link_separator_color = kemet_get_sub_option( $prefix . '-submenu-link-separator-color', 'initial' );
				$submenu_border_top_width     = kemet_get_option( $prefix . '-submenu-border-top-width' );
				$submenu_items_border         = kemet_get_option( $prefix . '-submenu-link-border' );

				$css_output = array(
					$selector                             => array(
						'--backgroundColor' => esc_attr( $bg_color ),
						'--padding'         => kemet_responsive_spacing( $menu_spacing, 'all', 'desktop' ),
						'--linksColor'      => esc_attr( $link_color ),
						'--linksHoverColor' => esc_attr( $link_h_color ),
					),
					$selector . ' > li > a'               => array(
						'font-family'         => 'var(--fontFamily)',
						'--borderBottomWidth' => kemet_responsive_slider( $link_h_border_width, 'desktop' ),
						'--padding'           => kemet_responsive_spacing( $menu_link_spacing, 'all', 'desktop' ),
					),
					$selector . ' > li > a:hover'         => array(
						'border-bottom-color' => 'var(--borderBottomColor, var(--linksHoverColor))',
						'--borderBottomColor' => esc_attr( $link_h_border_color ),
					),
					$selector . ' > .current-menu-item > a, ' . $selector . ' > .current-menu-ancestor > a, ' . $selector . ' > .current_page_item > a' => array(
						'--linksColor'      => esc_attr( $link_active_color ),
						'--backgroundColor' => esc_attr( $link_active_bg_color ),
						'background-color'  => 'var(--backgroundColor)',
						'border-radius'     => kemet_responsive_slider( $link_active_border_radius, 'desktop' ),
					),
					$selector . ' > li ul'                => array(
						'width'            => kemet_slider( $submenu_width ),
						'--borderTopWidth' => kemet_slider( $submenu_border_top_width ),
						'--borderTopColor' => esc_attr( $submenu_top_border_color ),
						'--padding'        => '0',
					),
					$selector . ' > li ul > li > a'       => array(
						'font-family'       => 'var(--fontFamily)',
						'background-color'  => 'var(--backgroundColor, var(--globalBackgroundColor))',
						'--backgroundColor' => esc_attr( $submenu_bg_color ),
						'--linksColor'      => esc_attr( $submenu_link_color ),
						'--borderBottom'    => kemet_border( $submenu_items_border ),
						'padding'           => '0.5em 1.6em',
						'--linksHoverColor' => esc_attr( $submenu_link_h_color ),
					),
					$selector . ' > li ul > li > a:hover' => array(
						'color'             => 'var(--linksHoverColor)',
						'--backgroundColor' => esc_attr( $submenu_bg_h_color ),
					),
					'body:not(.kmt-header-break-point) #site-navigation ' . $selector . ' .kemet-megamenu-item .mega-menu-full-wrap' => array(
						'--borderTopWidth' => kemet_slider( $submenu_border_top_width ),
						'--borderTopColor' => esc_attr( $submenu_top_border_color ),
					),
				);

				/* Parse CSS from array() */
				$parse_css = kemet_parse_css( $css_output );

				$tablet = array(
					$selector               => array(
						'--padding' => kemet_responsive_spacing( $menu_spacing, 'all', 'tablet' ),
					),
					$selector . ' > li > a' => array(
						'--borderBottomWidth' => kemet_responsive_slider( $link_h_border_width, 'tablet' ),
						'--padding'           => kemet_responsive_spacing( $menu_link_spacing, 'all', 'tablet' ),
					),
					$selector . ' > .current-menu-item > a, ' . $selector . ' .current-menu-ancestor > a, ' . $selector . ' .current_page_item > a' => array(
						'border-radius' => kemet_responsive_slider( $link_active_border_radius, 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector               => array(
						'--padding' => kemet_responsive_spacing( $menu_spacing, 'all', 'mobile' ),
					),
					$selector . ' > li > a' => array(
						'--borderBottomWidth' => kemet_responsive_slider( $link_h_border_width, 'mobile' ),
						'--padding'           => kemet_responsive_spacing( $menu_link_spacing, 'all', 'mobile' ),
					),
					$selector . ' > .current-menu-item > a, ' . $selector . ' > .current-menu-ancestor > a, ' . $selector . ' > .current_page_item > a' => array(
						'border-radius' => kemet_responsive_slider( $link_active_border_radius, 'mobile' ),
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


