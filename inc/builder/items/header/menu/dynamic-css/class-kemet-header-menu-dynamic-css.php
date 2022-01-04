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
				$link_active_bg_color         = kemet_get_sub_option( $prefix . '-link-active-bg-color', 'initial' );
				$link_active_color            = kemet_get_sub_option( $prefix . '-link-color', 'active' );
				$link_active_border_radius    = kemet_get_option( $prefix . '-link-active-border-radius' );
				$link_h_border                = kemet_get_option( $prefix . '-link-border-hover' );
				$menu_spacing                 = kemet_get_option( $prefix . '-spacing' );
				$menu_margin                  = kemet_get_option( $prefix . '-margin' );
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
						'--padding-top'     => kemet_responsive_spacing( $menu_spacing, 'top', 'desktop' ),
						'--padding-left'    => kemet_responsive_spacing( $menu_spacing, 'left', 'desktop' ),
						'--padding-bottom'  => kemet_responsive_spacing( $menu_spacing, 'bottom', 'desktop' ),
						'--padding-right'   => kemet_responsive_spacing( $menu_spacing, 'right', 'desktop' ),
						'--margin-top'      => kemet_responsive_spacing( $menu_margin, 'top', 'desktop' ),
						'--margin-right'    => kemet_responsive_spacing( $menu_margin, 'right', 'desktop' ),
						'--margin-bottom'   => kemet_responsive_spacing( $menu_margin, 'bottom', 'desktop' ),
						'--margin-left'     => kemet_responsive_spacing( $menu_margin, 'left', 'desktop' ),
						'--linksColor'      => esc_attr( $link_color ),
						'--linksHoverColor' => esc_attr( $link_h_color ),
					),
					$selector . ' > li > a'               => array(
						'font-family'      => 'var(--fontFamily)',
						'--effectBorder'   => kemet_border(
							$link_h_border,
							array(
								'color' => 'var(--linksHoverColor)',
							)
						),
						'--padding-top'    => kemet_responsive_spacing( $menu_link_spacing, 'top', 'desktop' ),
						'--padding-left'   => kemet_responsive_spacing( $menu_link_spacing, 'left', 'desktop' ),
						'--padding-bottom' => kemet_responsive_spacing( $menu_link_spacing, 'bottom', 'desktop' ),
						'--padding-right'  => kemet_responsive_spacing( $menu_link_spacing, 'right', 'desktop' ),
					),
					$selector . '[data-effect=background]>.menu-item>a:hover::after, ' . $selector . '[data-effect=background]>.page_item>a:hover::after' => array(
						'--padding-top'    => kemet_responsive_spacing( $menu_link_spacing, 'top', 'desktop' ),
						'--padding-left'   => kemet_responsive_spacing( $menu_link_spacing, 'left', 'desktop' ),
						'--padding-bottom' => kemet_responsive_spacing( $menu_link_spacing, 'bottom', 'desktop' ),
						'--padding-right'  => kemet_responsive_spacing( $menu_link_spacing, 'right', 'desktop' ),
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
						'--padding-top'    => '0',
						'--padding-left'   => '0',
						'--padding-bottom' => '0',
						'--padding-right'  => '0',
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
						'--padding-top'    => kemet_responsive_spacing( $menu_spacing, 'top', 'tablet' ),
						'--padding-left'   => kemet_responsive_spacing( $menu_spacing, 'left', 'tablet' ),
						'--padding-bottom' => kemet_responsive_spacing( $menu_spacing, 'bottom', 'tablet' ),
						'--padding-right'  => kemet_responsive_spacing( $menu_spacing, 'right', 'tablet' ),
						'--margin-top'     => kemet_responsive_spacing( $menu_margin, 'top', 'tablet' ),
						'--margin-right'   => kemet_responsive_spacing( $menu_margin, 'right', 'tablet' ),
						'--margin-bottom'  => kemet_responsive_spacing( $menu_margin, 'bottom', 'tablet' ),
						'--margin-left'    => kemet_responsive_spacing( $menu_margin, 'left', 'tablet' ),
					),
					$selector . ' > li > a' => array(
						'--padding-top'    => kemet_responsive_spacing( $menu_link_spacing, 'top', 'tablet' ),
						'--padding-left'   => kemet_responsive_spacing( $menu_link_spacing, 'left', 'tablet' ),
						'--padding-bottom' => kemet_responsive_spacing( $menu_link_spacing, 'bottom', 'tablet' ),
						'--padding-right'  => kemet_responsive_spacing( $menu_link_spacing, 'right', 'tablet' ),
					),
					$selector . '[data-effect=background]>.menu-item>a:hover::after, ' . $selector . '[data-effect=background]>.page_item>a:hover::after' => array(
						'--padding-top'    => kemet_responsive_spacing( $menu_link_spacing, 'top', 'tablet' ),
						'--padding-left'   => kemet_responsive_spacing( $menu_link_spacing, 'left', 'tablet' ),
						'--padding-bottom' => kemet_responsive_spacing( $menu_link_spacing, 'bottom', 'tablet' ),
						'--padding-right'  => kemet_responsive_spacing( $menu_link_spacing, 'right', 'tablet' ),
					),
					$selector . ' > .current-menu-item > a, ' . $selector . ' .current-menu-ancestor > a, ' . $selector . ' .current_page_item > a' => array(
						'border-radius' => kemet_responsive_slider( $link_active_border_radius, 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector               => array(
						'--padding-top'    => kemet_responsive_spacing( $menu_spacing, 'top', 'mobile' ),
						'--padding-left'   => kemet_responsive_spacing( $menu_spacing, 'left', 'mobile' ),
						'--padding-bottom' => kemet_responsive_spacing( $menu_spacing, 'bottom', 'mobile' ),
						'--padding-right'  => kemet_responsive_spacing( $menu_spacing, 'right', 'mobile' ),
						'--margin-top'     => kemet_responsive_spacing( $menu_margin, 'top', 'mobile' ),
						'--margin-right'   => kemet_responsive_spacing( $menu_margin, 'right', 'mobile' ),
						'--margin-bottom'  => kemet_responsive_spacing( $menu_margin, 'bottom', 'mobile' ),
						'--margin-left'    => kemet_responsive_spacing( $menu_margin, 'left', 'mobile' ),
					),
					$selector . ' > li > a' => array(
						'--padding-top'    => kemet_responsive_spacing( $menu_link_spacing, 'top', 'mobile' ),
						'--padding-left'   => kemet_responsive_spacing( $menu_link_spacing, 'left', 'mobile' ),
						'--padding-bottom' => kemet_responsive_spacing( $menu_link_spacing, 'bottom', 'mobile' ),
						'--padding-right'  => kemet_responsive_spacing( $menu_link_spacing, 'right', 'mobile' ),
					),
					$selector . '[data-effect=background]>.menu-item>a:hover::after, ' . $selector . '[data-effect=background]>.page_item>a:hover::after' => array(
						'--padding-top'    => kemet_responsive_spacing( $menu_link_spacing, 'top', 'mobile' ),
						'--padding-left'   => kemet_responsive_spacing( $menu_link_spacing, 'left', 'mobile' ),
						'--padding-bottom' => kemet_responsive_spacing( $menu_link_spacing, 'bottom', 'mobile' ),
						'--padding-right'  => kemet_responsive_spacing( $menu_link_spacing, 'right', 'mobile' ),
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


