<?php
/**
 * Kemet Add Dynamic Css
 *
 * @package Kemet Theme
 */

if ( ! class_exists( 'Kemet_Overlay_Header_Dynamic_Css' ) ) {

	/**
	 * Customizer Register
	 */
	class Kemet_Overlay_Header_Dynamic_Css extends Kemet_Add_Dynamic_Css {

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css css.
		 * @return string
		 */
		public function dynamic_css( $dynamic_css ) {
			$prefix         = 'overlay-header';
			$overlay_header = kemet_get_option( $prefix . '-enable' );

			if ( $overlay_header ) {
				$enable_device = kemet_get_option( $prefix . '-enable-device' );
				$selector      = '.kmt-' . $prefix;
				if ( 'desktop' === $enable_device ) {
					$selector = $selector . ':not(.kmt-header-break-point)';
				} elseif ( 'mobile' === $enable_device ) {
					$selector = $selector . '.kmt-header-break-point';
				}
				$selector   = $selector . ' #sitehead';
				$backgrourd = kemet_get_option( $prefix . '-bg-color' );
				// Menu Colors
				$menu_selector     = $selector . ' .main-header-menu';
				$menu_link_color   = kemet_get_option( $prefix . '-menu-link-color' );
				$menu_backgrourd   = kemet_get_option( $prefix . '-menu-bg-color' );
				$menu_link_h_color = kemet_get_option( $prefix . '-menu-link-h-color' );
				// Submenu
				$submenu_link_color         = kemet_get_option( $prefix . '-submenu-link-color' );
				$submenu_backgrourd         = kemet_get_option( $prefix . '-submenu-bg-color' );
				$submenu_link_h_color       = kemet_get_option( $prefix . '-submenu-link-h-color' );
				$submenu_backgrourd_h_color = kemet_get_option( $prefix . '-submenu-bg-h-color' );
				// Search
				$search_selector       = $selector . ' .kmt-header-item-search';
				$search_icon_color     = kemet_get_option( $prefix . '-search-icon-color' );
				$search_icon_h_color   = kemet_get_option( $prefix . '-search-icon-h-color' );
				$search_border_color   = kemet_get_option( $prefix . '-search-border-color' );
				$search_bg_color       = kemet_get_option( $prefix . '-search-bg-color' );
				$search_input_bg_color = kemet_get_option( $prefix . '-search-input-bg-color' );
				$search_text_color     = kemet_get_option( $prefix . '-search-text-color' );
				// Search Box
				$search_box_selector     = $selector . ' .kmt-header-item-search-box';
				$search_box_icon_color   = kemet_get_option( $prefix . '-search-box-icon-color' );
				$search_box_icon_h_color = kemet_get_option( $prefix . '-search-box-icon-h-color' );
				$search_box_border_color = kemet_get_option( $prefix . '-search-box-border-color' );
				$search_box_bg_color     = kemet_get_option( $prefix . '-search-box-bg-color' );
				$search_box_text_color   = kemet_get_option( $prefix . '-search-box-text-color' );
				// Widget
				$widget_selector      = $selector . ' .kmt-widget-area';
				$widget_title_color   = kemet_get_option( $prefix . '-widget-title-color' );
				$widget_content_color = kemet_get_option( $prefix . '-widget-content-color' );
				$widget_link_color    = kemet_get_option( $prefix . '-widget-link-color' );
				$widget_link_h_color  = kemet_get_option( $prefix . '-widget-link-h-color' );
				// Html
				$html_selector     = $selector . ' .kmt-custom-html';
				$html_color_color  = kemet_get_option( $prefix . '-html-text-color' );
				$html_link_color   = kemet_get_option( $prefix . '-html-link-color' );
				$html_link_h_color = kemet_get_option( $prefix . '-html-link-h-color' );
				// Toggle
				$toggle_selector   = $selector . ' .toggle-button';
				$toggle_icon_color = kemet_get_option( $prefix . '-toggle-icon-color' );
				$toggle_bg_color   = kemet_get_option( $prefix . '-toggle-bg-color' );

				$css_output = array(
					$selector                             => array(
						'position' => esc_attr( 'absolute' ),
						'left'     => esc_attr( 0 ),
						'right'    => esc_attr( 0 ),
					),
					$selector . ' [class*="-header-bar"]' => array(
						'background-image'  => esc_attr( 'none' ),
						'--backgroundColor' => esc_attr( 'transparent' ),
					),
					$selector . ' .top-header-bar, ' . $selector . ' .main-header-bar, ' . $selector . ' .bottom-header-bar' => array(
						'--backgroundColor' => kemet_responsive_color( $backgrourd, 'initial', 'desktop' ),
					),
					$menu_selector                        => array(
						'--backgroundColor' => kemet_responsive_color( $menu_backgrourd, 'initial', 'desktop' ),
					),
					$menu_selector . ' > li > a'          => array(
						'--headingLinksColor' => kemet_responsive_color( $menu_link_color, 'initial', 'desktop' ),
						'--linksHoverColor'   => kemet_responsive_color( $menu_link_h_color, 'hover', 'desktop' ),
					),
					$menu_selector . ' > li ul > li > a'  => array(
						'--headingLinksColor' => kemet_responsive_color( $submenu_link_color, 'initial', 'desktop' ),
						'--backgroundColor'   => kemet_responsive_color( $submenu_backgrourd, 'initial', 'desktop' ),
						'--linksHoverColor'   => kemet_responsive_color( $submenu_link_h_color, 'hover', 'desktop' ),
					),
					$menu_selector . ' > li ul > li > a:hover' => array(
						'--backgroundColor' => kemet_responsive_color( $submenu_backgrourd_h_color, 'hover', 'desktop' ),
					),
					$search_selector . ' form'            => array(
						'background-color' => esc_attr( $search_bg_color ),
					),
					$search_selector . ' .kemet-search-icon' => array(
						'--headingLinksColor' => esc_attr( $search_icon_color ),
						'--linksHoverColor'   => esc_attr( $search_icon_h_color ),
					),
					$selector . ' .kmt-search-menu-icon form .search-field' => array(
						'--inputColor'           => esc_attr( $search_text_color ),
						'--inputBackgroundColor' => esc_attr( $search_input_bg_color ),
						'--inputBorderColor'     => esc_attr( $search_border_color ),
					),
					$search_box_selector . ' .kmt-search-box-form::after' => array(
						'--inputColor' => esc_attr( $search_box_icon_color ),
					),
					$search_box_selector . ' .kmt-search-box-form:hover::after' => array(
						'--inputColor' => esc_attr( $search_box_icon_h_color ),
					),
					$selector . ' .kmt-search-box-form .search-field' => array(
						'--inputColor'           => esc_attr( $search_box_text_color ),
						'--inputBackgroundColor' => esc_attr( $search_box_bg_color ),
						'--inputBorderColor'     => esc_attr( $search_box_border_color ),
					),
					$widget_selector . ' .widget-title'   => array(
						'--headingLinksColor' => kemet_responsive_color( $widget_title_color, 'initial', 'desktop' ),
					),
					$widget_selector                      => array(
						'--textColor'         => kemet_responsive_color( $widget_content_color, 'initial', 'desktop' ),
						'--headingLinksColor' => kemet_responsive_color( $widget_link_color, 'initial', 'desktop' ),
						'--linksHoverColor'   => kemet_responsive_color( $widget_link_h_color, 'hover', 'desktop' ),
					),
					$html_selector                        => array(
						'--textColor'         => kemet_responsive_color( $html_color_color, 'initial', 'desktop' ),
						'--headingLinksColor' => kemet_responsive_color( $html_link_color, 'initial', 'desktop' ),
						'--linksHoverColor'   => kemet_responsive_color( $html_link_h_color, 'hover', 'desktop' ),
					),
					$toggle_selector                      => array(
						'--buttonColor'           => kemet_responsive_color( $toggle_icon_color, 'initial', 'desktop' ),
						'--buttonBackgroundColor' => kemet_responsive_color( $toggle_bg_color, 'initial', 'desktop' ),
					),
				);

				/* Parse CSS from array() */
				$parse_css = kemet_parse_css( $css_output );

				$tablet = array(
					$selector . ' .top-header-bar, ' . $selector . ' .main-header-bar, ' . $selector . ' .bottom-header-bar' => array(
						'--backgroundColor' => kemet_responsive_color( $backgrourd, 'initial', 'tablet' ),
					),
					$menu_selector                       => array(
						'--backgroundColor' => kemet_responsive_color( $menu_backgrourd, 'initial', 'tablet' ),
					),
					$menu_selector . ' > li > a'         => array(
						'--headingLinksColor' => kemet_responsive_color( $menu_link_color, 'initial', 'tablet' ),
						'--linksHoverColor'   => kemet_responsive_color( $menu_link_h_color, 'hover', 'tablet' ),
					),
					$menu_selector . ' > li ul > li > a' => array(
						'--headingLinksColor' => kemet_responsive_color( $submenu_link_color, 'initial', 'tablet' ),
						'--backgroundColor'   => kemet_responsive_color( $submenu_backgrourd, 'initial', 'tablet' ),
						'--linksHoverColor'   => kemet_responsive_color( $submenu_link_h_color, 'hover', 'tablet' ),
					),
					$menu_selector . ' > li ul > li > a:hover' => array(
						'--backgroundColor' => kemet_responsive_color( $submenu_backgrourd_h_color, 'hover', 'tablet' ),
					),
					$widget_selector . ' .widget-title'  => array(
						'--headingLinksColor' => kemet_responsive_color( $widget_title_color, 'initial', 'tablet' ),
					),
					$widget_selector                     => array(
						'--textColor'         => kemet_responsive_color( $widget_content_color, 'initial', 'tablet' ),
						'--headingLinksColor' => kemet_responsive_color( $widget_link_color, 'initial', 'tablet' ),
						'--linksHoverColor'   => kemet_responsive_color( $widget_link_h_color, 'hover', 'tablet' ),
					),
					$html_selector                       => array(
						'--textColor'         => kemet_responsive_color( $html_color_color, 'initial', 'tablet' ),
						'--headingLinksColor' => kemet_responsive_color( $html_link_color, 'initial', 'tablet' ),
						'--linksHoverColor'   => kemet_responsive_color( $html_link_h_color, 'hover', 'tablet' ),
					),
					$toggle_selector                     => array(
						'--buttonColor'           => kemet_responsive_color( $toggle_icon_color, 'initial', 'tablet' ),
						'--buttonBackgroundColor' => kemet_responsive_color( $toggle_bg_color, 'initial', 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector . ' .top-header-bar, ' . $selector . ' .main-header-bar, ' . $selector . ' .bottom-header-bar' => array(
						'--backgroundColor' => kemet_responsive_color( $backgrourd, 'initial', 'mobile' ),
					),
					$menu_selector                       => array(
						'--backgroundColor' => kemet_responsive_color( $menu_backgrourd, 'initial', 'mobile' ),
					),
					$menu_selector . ' > li > a'         => array(
						'--headingLinksColor' => kemet_responsive_color( $menu_link_color, 'initial', 'mobile' ),
						'--linksHoverColor'   => kemet_responsive_color( $menu_link_h_color, 'hover', 'mobile' ),
					),
					$menu_selector . ' > li ul > li > a' => array(
						'--headingLinksColor' => kemet_responsive_color( $submenu_link_color, 'initial', 'mobile' ),
						'--backgroundColor'   => kemet_responsive_color( $submenu_backgrourd, 'initial', 'mobile' ),
						'--linksHoverColor'   => kemet_responsive_color( $submenu_link_h_color, 'hover', 'mobile' ),
					),
					$menu_selector . ' > li ul > li > a:hover' => array(
						'--backgroundColor' => kemet_responsive_color( $submenu_backgrourd_h_color, 'hover', 'mobile' ),
					),
					$widget_selector . ' .widget-title'  => array(
						'--headingLinksColor' => kemet_responsive_color( $widget_title_color, 'initial', 'mobile' ),
					),
					$widget_selector                     => array(
						'--textColor'         => kemet_responsive_color( $widget_content_color, 'initial', 'mobile' ),
						'--headingLinksColor' => kemet_responsive_color( $widget_link_color, 'initial', 'mobile' ),
						'--linksHoverColor'   => kemet_responsive_color( $widget_link_h_color, 'hover', 'mobile' ),
					),
					$html_selector                       => array(
						'--textColor'         => kemet_responsive_color( $html_color_color, 'initial', 'mobile' ),
						'--headingLinksColor' => kemet_responsive_color( $html_link_color, 'initial', 'mobile' ),
						'--linksHoverColor'   => kemet_responsive_color( $html_link_h_color, 'hover', 'mobile' ),
					),
					$toggle_selector                     => array(
						'--buttonColor'           => kemet_responsive_color( $toggle_icon_color, 'initial', 'mobile' ),
						'--buttonBackgroundColor' => kemet_responsive_color( $toggle_bg_color, 'initial', 'mobile' ),
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

new Kemet_Overlay_Header_Dynamic_Css();

