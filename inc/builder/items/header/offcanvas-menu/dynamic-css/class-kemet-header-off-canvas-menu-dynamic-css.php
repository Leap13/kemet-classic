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

				$prefix                    = 'offcanvas-menu';
				$selector                  = '#' . $prefix;
				$link_bg_color             = kemet_get_option( $prefix . '-link-bg-color' );
				$link_color                = kemet_get_option( $prefix . '-link-color' );
				$link_border_color         = kemet_get_option( $prefix . '-link-border-color' );
				$submenu_link_bg_color     = kemet_get_option( $prefix . '-submenu-link-bg-color' );
				$submenu_link_color        = kemet_get_option( $prefix . '-submenu-link-color' );
				$submenu_link_border_color = kemet_get_option( $prefix . '-submenu-link-border-color' );
				$link_border_width         = kemet_get_option( $prefix . '-border-bottom-width' );
				$link_spacing              = kemet_get_option( $prefix . '-item-spacing' );
				$css_output                = array(
					$selector => array(
						'--backgroundColor'   => 'transparent',
						'--borderBottomWidth' => kemet_responsive_slider( $link_border_width, 'desktop' ),
						'--linksColor'        => kemet_responsive_color( $link_color, 'initial', 'desktop' ),
						'--backgroundColor'   => 'transparent',
						'--borderBottomColor' => kemet_responsive_color( $link_border_color, 'desktop' ),
						'--linksHoverColor'   => kemet_responsive_color( $link_color, 'hover', 'desktop' ),
					),
					$selector . ' li > .kmt-menu-item-wrap' => array(
						'border-bottom-width' => 'var(--borderBottomWidth)',
						'border-bottom-style' => 'var(----borderBottomStyle, solid)',
						'border-bottom-color' => 'var(--borderBottomColor)',
					),
					$selector . ' li > .kmt-menu-item-wrap' => array(
						'border-bottom-style' => 'var(--borderBottomStyle,solid)',
						'color'               => 'var(--textColor)',
						'--textColor'         => 'var(--linksColor)',
					),
					$selector . ' li > .kmt-menu-item-wrap:hover' => array(
						'--textColor' => 'var(--linksHoverColor)',
					),
					$selector . ' li > .kmt-menu-item-wrap a' => array(
						'color' => 'inherit !important',
					),
					$selector . ' li > a, ' . $selector . ' li > .kmt-menu-item-wrap' => array(
						'font-family'         => 'var(--fontFamily)',
						'--padding'           => kemet_responsive_spacing( $link_spacing, 'all', 'desktop' ),
						'--backgroundColor'   => kemet_responsive_color( $link_bg_color, 'initial', 'desktop' ),
						'border-bottom-width' => 'var(--borderBottomWidth)',
						'border-bottom-color' => 'var(--borderBottomColor)',
						'background-color'    => 'var(--backgroundColor)',
						'padding'             => 'var(--padding)',
					),
					$selector . ' li > a:hover, ' . $selector . ' li > .kmt-menu-item-wrap:hover' => array(
						'--backgroundColor'   => kemet_responsive_color( $link_bg_color, 'hover', 'desktop' ),
						'--borderBottomColor' => kemet_responsive_color( $link_border_color, 'hover', 'desktop' ),
					),
					$selector . ' > li ul > li > a, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap' => array(
						'--linksColor'        => kemet_responsive_color( $submenu_link_color, 'initial', 'desktop' ),
						'--backgroundColor'   => kemet_responsive_color( $submenu_link_bg_color, 'initial', 'desktop' ),
						'--borderBottomColor' => kemet_responsive_color( $submenu_link_border_color, 'initial', 'desktop' ),
						'--linksHoverColor'   => kemet_responsive_color( $submenu_link_color, 'hover', 'desktop' ),
					),
					$selector . ' > li ul > li > a:hover, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap:hover' => array(
						'--backgroundColor'   => kemet_responsive_color( $submenu_link_bg_color, 'hover', 'desktop' ),
						'--borderBottomColor' => kemet_responsive_color( $submenu_link_border_color, 'hover', 'desktop' ),
					),
				);

				/* Parse CSS from array() */
				$parse_css = kemet_parse_css( $css_output );

				$tablet = array(
					$selector => array(
						'--borderBottomWidth' => kemet_responsive_slider( $link_border_width, 'tablet' ),
						'--linksColor'        => kemet_responsive_color( $link_color, 'initial', 'tablet' ),
						'--borderBottomColor' => kemet_responsive_color( $link_border_color, 'tablet' ),
						'--linksHoverColor'   => kemet_responsive_color( $link_color, 'hover', 'tablet' ),
					),
					$selector . ' li > a, ' . $selector . ' li > .kmt-menu-item-wrap' => array(
						'--padding'         => kemet_responsive_spacing( $link_spacing, 'all', 'tablet' ),
						'--backgroundColor' => kemet_responsive_color( $link_bg_color, 'initial', 'tablet' ),
					),
					$selector . ' li > a:hover, ' . $selector . ' li > .kmt-menu-item-wrap:hover' => array(
						'--backgroundColor'   => kemet_responsive_color( $link_bg_color, 'hover', 'tablet' ),
						'--borderBottomColor' => kemet_responsive_color( $link_border_color, 'hover', 'tablet' ),
					),
					$selector . ' > li ul > li > a, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap' => array(
						'--linksColor'        => kemet_responsive_color( $submenu_link_color, 'initial', 'tablet' ),
						'--backgroundColor'   => kemet_responsive_color( $submenu_link_bg_color, 'initial', 'tablet' ),
						'--borderBottomColor' => kemet_responsive_color( $submenu_link_border_color, 'initial', 'tablet' ),
						'--linksHoverColor'   => kemet_responsive_color( $submenu_link_color, 'hover', 'tablet' ),
					),
					$selector . ' > li ul > li > a:hover, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap:hover' => array(
						'--backgroundColor'   => kemet_responsive_color( $submenu_link_bg_color, 'hover', 'tablet' ),
						'--borderBottomColor' => kemet_responsive_color( $submenu_link_border_color, 'hover', 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector => array(
						'--borderBottomWidth' => kemet_responsive_slider( $link_border_width, 'mobile' ),
						'--linksColor'        => kemet_responsive_color( $link_color, 'initial', 'mobile' ),
						'--borderBottomColor' => kemet_responsive_color( $link_border_color, 'mobile' ),
						'--linksHoverColor'   => kemet_responsive_color( $link_color, 'hover', 'mobile' ),
					),
					$selector . ' li > a, ' . $selector . ' li > .kmt-menu-item-wrap' => array(
						'--padding'         => kemet_responsive_spacing( $link_spacing, 'all', 'mobile' ),
						'--backgroundColor' => kemet_responsive_color( $link_bg_color, 'initial', 'mobile' ),
					),
					$selector . ' li > a:hover, ' . $selector . ' li > .kmt-menu-item-wrap:hover' => array(
						'--backgroundColor'   => kemet_responsive_color( $link_bg_color, 'hover', 'mobile' ),
						'--borderBottomColor' => kemet_responsive_color( $link_border_color, 'hover', 'mobile' ),
					),
					$selector . ' > li ul > li > a, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap' => array(
						'--linksColor'        => kemet_responsive_color( $submenu_link_color, 'initial', 'mobile' ),
						'--backgroundColor'   => kemet_responsive_color( $submenu_link_bg_color, 'initial', 'mobile' ),
						'--borderBottomColor' => kemet_responsive_color( $submenu_link_border_color, 'initial', 'mobile' ),
						'--linksHoverColor'   => kemet_responsive_color( $submenu_link_color, 'hover', 'mobile' ),
					),
					$selector . ' > li ul > li > a:hover, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap:hover' => array(
						'--backgroundColor'   => kemet_responsive_color( $submenu_link_bg_color, 'hover', 'mobile' ),
						'--borderBottomColor' => kemet_responsive_color( $submenu_link_border_color, 'hover', 'mobile' ),
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

