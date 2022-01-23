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
				$submenu_link_bg_color     = kemet_get_option( $prefix . '-submenu-link-bg-color' );
				$submenu_link_color        = kemet_get_option( $prefix . '-submenu-link-color' );
				$submenu_link_border_color = kemet_get_option( $prefix . '-submenu-link-border-color' );
				$link_border_width         = kemet_get_option( $prefix . '-border-bottom-width' );
				$link_border               = kemet_get_option( $prefix . '-border-bottom' );
				$link_spacing              = kemet_get_option( $prefix . '-item-spacing' );

				// var_dump( $link_border );
				$css_output = array(
					$selector => array(
						'--lineHeight'      => 'inherit',
						'--backgroundColor' => 'transparent',
						'--linksColor'      => kemet_responsive_color( $link_color, 'initial', 'desktop' ),
						'--backgroundColor' => 'transparent',
						'--linksHoverColor' => kemet_responsive_color( $link_color, 'hover', 'desktop' ),
					),
					$selector . ' li > .kmt-menu-item-wrap, ' . $selector . ' li > a' => array(
						'border-bottom'  => 'var(--borderBottom)',
						'--borderBottom' => kemet_responsive_border( $link_border, 'desktop' ),
					),
					$selector . ' li > .kmt-menu-item-wrap' => array(
						'color'       => 'var(--textColor)',
						'--textColor' => 'var(--linksColor)',
					),
					$selector . ' li > .kmt-menu-item-wrap:hover' => array(
						'--textColor' => 'var(--linksHoverColor)',
					),
					$selector . ' li > .kmt-menu-item-wrap a' => array(
						'color' => 'inherit !important',
					),
					$selector . ' li > a, ' . $selector . ' li > .kmt-menu-item-wrap' => array(
						'font-family'       => 'var(--fontFamily)',
						'--padding-top'     => kemet_responsive_spacing( $link_spacing, 'top', 'desktop' ),
						'--padding-left'    => kemet_responsive_spacing( $link_spacing, 'left', 'desktop' ),
						'--padding-bottom'  => kemet_responsive_spacing( $link_spacing, 'bottom', 'desktop' ),
						'--padding-right'   => kemet_responsive_spacing( $link_spacing, 'right', 'desktop' ),
						'--backgroundColor' => kemet_responsive_color( $link_bg_color, 'initial', 'desktop' ),
						'background-color'  => 'var(--backgroundColor)',
						'padding-top'       => 'var(--padding-top)',
						'padding-left'      => 'var(--padding-left)',
						'padding-bottom'    => 'var(--padding-bottom)',
						'padding-right'     => 'var(--padding-right)',
					),
					$selector . ' li > a:hover, ' . $selector . ' li > .kmt-menu-item-wrap:hover' => array(
						'--backgroundColor' => kemet_responsive_color( $link_bg_color, 'hover', 'desktop' ),
						'--borderBottom'    => kemet_responsive_color( $link_border, 'secondColor', 'desktop' ),
					),
					$selector . ' > li ul > li > a, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap' => array(
						'border-bottom-color' => kemet_responsive_color( $submenu_link_border_color, 'initial', 'desktop' ),
						'--linksColor'        => kemet_responsive_color( $submenu_link_color, 'initial', 'desktop' ),
						'--backgroundColor'   => kemet_responsive_color( $submenu_link_bg_color, 'initial', 'desktop' ),
						'--linksHoverColor'   => kemet_responsive_color( $submenu_link_color, 'hover', 'desktop' ),
					),
					$selector . ' > li ul > li > a:hover, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap:hover' => array(
						'--backgroundColor'   => kemet_responsive_color( $submenu_link_bg_color, 'hover', 'desktop' ),
						'border-bottom-color' => kemet_responsive_color( $submenu_link_border_color, 'hover', 'desktop' ),
					),
				);

				/* Parse CSS from array() */
				$parse_css = kemet_parse_css( $css_output );

				$tablet = array(
					$selector => array(
						'--linksColor'      => kemet_responsive_color( $link_color, 'initial', 'tablet' ),
						'--linksHoverColor' => kemet_responsive_color( $link_color, 'hover', 'tablet' ),
					),
					$selector . ' li > .kmt-menu-item-wrap, ' . $selector . ' li > a' => array(
						'--borderBottom' => kemet_responsive_border( $link_border, 'tablet' ),
					),
					$selector . ' li > a, ' . $selector . ' li > .kmt-menu-item-wrap' => array(
						'--padding-top'     => kemet_responsive_spacing( $link_spacing, 'top', 'tablet' ),
						'--padding-left'    => kemet_responsive_spacing( $link_spacing, 'left', 'tablet' ),
						'--padding-bottom'  => kemet_responsive_spacing( $link_spacing, 'bottom', 'tablet' ),
						'--padding-right'   => kemet_responsive_spacing( $link_spacing, 'right', 'tablet' ),
						'--backgroundColor' => kemet_responsive_color( $link_bg_color, 'initial', 'tablet' ),
					),
					$selector . ' li > a:hover, ' . $selector . ' li > .kmt-menu-item-wrap:hover' => array(
						'--backgroundColor'   => kemet_responsive_color( $link_bg_color, 'hover', 'tablet' ),
						'border-bottom-color' => kemet_responsive_color( $link_border, 'secondColor', 'tablet' ),
					),
					$selector . ' > li ul > li > a, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap' => array(
						'--linksColor'        => kemet_responsive_color( $submenu_link_color, 'initial', 'tablet' ),
						'--backgroundColor'   => kemet_responsive_color( $submenu_link_bg_color, 'initial', 'tablet' ),
						'--linksHoverColor'   => kemet_responsive_color( $submenu_link_color, 'hover', 'tablet' ),
						'border-bottom-color' => kemet_responsive_color( $submenu_link_border_color, 'initial', 'tablet' ),
					),
					$selector . ' > li ul > li > a:hover, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap:hover' => array(
						'--backgroundColor'   => kemet_responsive_color( $submenu_link_bg_color, 'hover', 'tablet' ),
						'border-bottom-color' => kemet_responsive_color( $submenu_link_border_color, 'hover', 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector . ' li > .kmt-menu-item-wrap, ' . $selector . ' li > a' => array(
						'--borderBottom' => kemet_responsive_border( $link_border, 'mobile' ),
					),
					$selector => array(
						'--linksColor'      => kemet_responsive_color( $link_color, 'initial', 'mobile' ),
						'--linksHoverColor' => kemet_responsive_color( $link_color, 'hover', 'mobile' ),
					),
					$selector . ' li > a, ' . $selector . ' li > .kmt-menu-item-wrap' => array(
						'--padding-top'     => kemet_responsive_spacing( $link_spacing, 'top', 'mobile' ),
						'--padding-left'    => kemet_responsive_spacing( $link_spacing, 'left', 'mobile' ),
						'--padding-bottom'  => kemet_responsive_spacing( $link_spacing, 'bottom', 'mobile' ),
						'--padding-right'   => kemet_responsive_spacing( $link_spacing, 'right', 'mobile' ),
						'--backgroundColor' => kemet_responsive_color( $link_bg_color, 'initial', 'mobile' ),
					),
					$selector . ' li > a:hover, ' . $selector . ' li > .kmt-menu-item-wrap:hover' => array(
						'--backgroundColor'   => kemet_responsive_color( $link_bg_color, 'hover', 'mobile' ),
						'border-bottom-color' => kemet_responsive_color( $link_border, 'secondColor', 'mobile' ),
					),
					$selector . ' > li ul > li > a, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap' => array(
						'--linksColor'        => kemet_responsive_color( $submenu_link_color, 'initial', 'mobile' ),
						'--backgroundColor'   => kemet_responsive_color( $submenu_link_bg_color, 'initial', 'mobile' ),
						'--linksHoverColor'   => kemet_responsive_color( $submenu_link_color, 'hover', 'mobile' ),
						'border-bottom-color' => kemet_responsive_color( $submenu_link_border_color, 'initial', 'mobile' ),
					),
					$selector . ' > li ul > li > a:hover, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap:hover' => array(
						'--backgroundColor'   => kemet_responsive_color( $submenu_link_bg_color, 'hover', 'mobile' ),
						'border-bottom-color' => kemet_responsive_color( $submenu_link_border_color, 'hover', 'mobile' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $mobile, '', '544' );

				$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( $prefix, $selector . ' > li > a, ' . $selector . ' > li > .kmt-menu-item-wrap' );
				$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( $prefix . '-submenu', $selector . ' > li ul > li > a, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap' );

				$dynamic_css .= $parse_css;
			}
			return $dynamic_css;
		}
	}
}

new Kemet_Header_Off_Canvas_Menu_Dynamic_Css();

