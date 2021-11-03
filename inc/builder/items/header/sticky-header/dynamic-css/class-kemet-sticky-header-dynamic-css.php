<?php
/**
 * Kemet Add Dynamic Css
 *
 * @package Kemet Theme
 */

if ( ! class_exists( 'Kemet_Sticky_Header_Dynamic_Css' ) ) {

	/**
	 * Customizer Register
	 */
	class Kemet_Sticky_Header_Dynamic_Css extends Kemet_Add_Dynamic_Css {

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css css.
		 * @return string
		 */
		public function dynamic_css( $dynamic_css ) {
			if ( Kemet_Sticky_Header_Partials::enable_sticky() ) {
				$selector          = '.kmt-is-sticky';
				$parent_selector   = '#sitehead .kmt-is-sticky';
				$sticky_logo_width = kemet_get_option( 'sticky-logo-width' );
				$menu_selector     = $selector . ' .main-header-menu';
				$html_selector     = $selector . ' .kmt-custom-html';
				$button_selector   = $selector . ' .header-button';
				// Menu Colors
				$menu_link_color = kemet_get_option( 'sticky-menu-link-color' );
				$menu_backgrourd = kemet_get_option( 'sticky-menu-bg-color' );
				// Submenu
				$submenu_link_color = kemet_get_option( 'sticky-submenu-link-color' );
				$submenu_backgrourd = kemet_get_option( 'sticky-submenu-bg-color' );
				// Button
				$button_text_color = kemet_get_option( 'sticky-button-text-color' );
				$button_bg_color   = kemet_get_option( 'sticky-button-bg-color' );
				// Html
				$html_text_color = kemet_get_option( 'sticky-html-text-color' );
				$html_link_color = kemet_get_option( 'sticky-html-link-color' );

				$css_output = array(
					$selector                              => array(
						'position' => esc_attr( 'fixed' ),
						'width'    => esc_attr( '100%' ),
						'z-index'  => esc_attr( '999' ),
					),
					'.custom-logo-link.sticky-custom-logo' => array(
						'display' => esc_attr( 'none' ),
					),
					'.kmt-sticky-logo ' . $selector . ' .custom-logo-link' => array(
						'display' => esc_attr( 'none' ),
					),
					'.kmt-sticky-logo ' . $selector . ' .sticky-custom-logo' => array(
						'display' => esc_attr( 'block' ),
					),
					$selector . ' .header-bar-content'     => array(
						'display' => esc_attr( 'transparent !important' ),
					),
					'.kmt-shrink-effect .kmt-grid-row'     => array(
						'transition' => esc_attr( 'all 0.3s linear' ),
					),
					'#sitehead ' . $selector . ' .custom-logo-link img , ' . $selector . ' .kemet-logo-svg' => array(
						'--logoWidth' => kemet_responsive_slider( $sticky_logo_width, 'desktop' ),
					),
					$menu_selector                         => array(
						'--backgroundColor' => kemet_responsive_color( $menu_backgrourd, 'initial', 'desktop' ),
					),
					$menu_selector . ' > li > a'           => array(
						'--linksColor'      => kemet_responsive_color( $menu_link_color, 'initial', 'desktop' ),
						'--linksHoverColor' => kemet_responsive_color( $menu_link_color, 'hover', 'desktop' ),
					),
					$menu_selector . ' > li ul > li > a'   => array(
						'--linksColor'      => kemet_responsive_color( $submenu_link_color, 'initial', 'desktop' ),
						'--backgroundColor' => kemet_responsive_color( $submenu_backgrourd, 'initial', 'desktop' ),
						'--linksHoverColor' => kemet_responsive_color( $submenu_link_color, 'hover', 'desktop' ),
					),
					$menu_selector . ' > li ul > li > a:hover' => array(
						'--backgroundColor' => kemet_responsive_color( $submenu_backgrourd, 'hover', 'desktop' ),
					),
					$html_selector                         => array(
						'--textColor'       => kemet_responsive_color( $html_text_color, 'initial', 'desktop' ),
						'--linksColor'      => kemet_responsive_color( $html_link_color, 'initial', 'desktop' ),
						'--linksHoverColor' => kemet_responsive_color( $html_link_color, 'hover', 'desktop' ),
					),
					$button_selector                       => array(
						'--buttonColor'                => kemet_responsive_color( $button_text_color, 'initial', 'desktop' ),
						'--buttonBackgroundColor'      => kemet_responsive_color( $button_bg_color, 'initial', 'desktop' ),
						'--buttonHoverColor'           => kemet_responsive_color( $button_text_color, 'hover', 'desktop' ),
						'--buttonBackgroundHoverColor' => kemet_responsive_color( $button_bg_color, 'hover', 'desktop' ),
					),
				);

				/* Parse CSS from array() */
				$parse_css = kemet_parse_css( $css_output );

				$tablet = array(
					$selector . ' .custom-logo-link img , ' . $selector . ' .kemet-logo-svg' => array(
						'--logoWidth' => kemet_responsive_slider( $sticky_logo_width, 'tablet' ),
					),
					$menu_selector                       => array(
						'--backgroundColor' => kemet_responsive_color( $menu_backgrourd, 'initial', 'tablet' ),
					),
					$menu_selector . ' > li > a'         => array(
						'--linksColor'      => kemet_responsive_color( $menu_link_color, 'initial', 'tablet' ),
						'--linksHoverColor' => kemet_responsive_color( $menu_link_color, 'hover', 'tablet' ),
					),
					$menu_selector . ' > li ul > li > a' => array(
						'--linksColor'      => kemet_responsive_color( $submenu_link_color, 'initial', 'tablet' ),
						'--backgroundColor' => kemet_responsive_color( $submenu_backgrourd, 'initial', 'tablet' ),
						'--linksHoverColor' => kemet_responsive_color( $submenu_link_color, 'hover', 'tablet' ),
					),
					$menu_selector . ' > li ul > li > a:hover' => array(
						'--backgroundColor' => kemet_responsive_color( $submenu_backgrourd, 'hover', 'tablet' ),
					),
					$html_selector                       => array(
						'--textColor'       => kemet_responsive_color( $html_text_color, 'initial', 'tablet' ),
						'--linksColor'      => kemet_responsive_color( $html_link_color, 'initial', 'tablet' ),
						'--linksHoverColor' => kemet_responsive_color( $html_link_color, 'hover', 'tablet' ),
					),
					$button_selector                     => array(
						'--buttonColor'                => kemet_responsive_color( $button_text_color, 'initial', 'tablet' ),
						'--buttonBackgroundColor'      => kemet_responsive_color( $button_bg_color, 'initial', 'tablet' ),
						'--buttonHoverColor'           => kemet_responsive_color( $button_text_color, 'hover', 'tablet' ),
						'--buttonBackgroundHoverColor' => kemet_responsive_color( $button_bg_color, 'hover', 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector . ' .custom-logo-link img , ' . $selector . ' .kemet-logo-svg' => array(
						'--logoWidth' => kemet_responsive_slider( $sticky_logo_width, 'mobile' ),
					),
					$menu_selector                       => array(
						'--backgroundColor' => kemet_responsive_color( $menu_backgrourd, 'initial', 'mobile' ),
					),
					$menu_selector . ' > li > a'         => array(
						'--linksColor'      => kemet_responsive_color( $menu_link_color, 'initial', 'mobile' ),
						'--linksHoverColor' => kemet_responsive_color( $menu_link_color, 'hover', 'mobile' ),
					),
					$menu_selector . ' > li ul > li > a' => array(
						'--linksColor'      => kemet_responsive_color( $submenu_link_color, 'initial', 'mobile' ),
						'--backgroundColor' => kemet_responsive_color( $submenu_backgrourd, 'initial', 'mobile' ),
						'--linksHoverColor' => kemet_responsive_color( $submenu_link_color, 'hover', 'mobile' ),
					),
					$menu_selector . ' > li ul > li > a:hover' => array(
						'--backgroundColor' => kemet_responsive_color( $submenu_backgrourd, 'hover', 'mobile' ),
					),
					$html_selector                       => array(
						'--textColor'       => kemet_responsive_color( $html_text_color, 'initial', 'mobile' ),
						'--linksColor'      => kemet_responsive_color( $html_link_color, 'initial', 'mobile' ),
						'--linksHoverColor' => kemet_responsive_color( $html_link_color, 'hover', 'mobile' ),
					),
					$button_selector                     => array(
						'--buttonColor'                => kemet_responsive_color( $button_text_color, 'initial', 'mobile' ),
						'--buttonBackgroundColor'      => kemet_responsive_color( $button_bg_color, 'initial', 'mobile' ),
						'--buttonHoverColor'           => kemet_responsive_color( $button_text_color, 'hover', 'mobile' ),
						'--buttonBackgroundHoverColor' => kemet_responsive_color( $button_bg_color, 'hover', 'mobile' ),
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

new Kemet_Sticky_Header_Dynamic_Css();

