<?php
/**
 * Kemet Add Dynamic Css
 *
 * @package Kemet Theme
 */

if ( ! class_exists( 'Kemet_Footer_Menu_Dynamic_Css' ) ) {

	/**
	 * Customizer Register
	 */
	class Kemet_Footer_Menu_Dynamic_Css extends Kemet_Add_Dynamic_Css {

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css css.
		 * @return string
		 */
		public function dynamic_css( $dynamic_css ) {
			if ( Kemet_Builder_Helper::is_item_loaded( 'footer-menu', 'footer' ) ) {
				$prefix              = 'footer-menu';
				$selector            = '#' . $prefix;
				$bg_color            = kemet_get_sub_option( $prefix . '-bg-color', 'initial' );
				$link_color          = kemet_get_sub_option( $prefix . '-link-color', 'initial' );
				$link_h_color        = kemet_get_sub_option( $prefix . '-link-color', 'hover' );
				$link_h_border_color = kemet_get_sub_option( $prefix . '-link-h-border-color', 'initial' );
				$link_h_border_width = kemet_get_option( $prefix . '-link-bottom-border-width-hover' );
				$menu_spacing        = kemet_get_option( $prefix . '-spacing' );
				$menu_link_spacing   = kemet_get_option( $prefix . '-item-spacing' );
				$line_height         = kemet_get_option( $prefix . '-line-height' );
				$items_width         = kemet_get_option( $prefix . '-items-direction' );
				$align               = kemet_get_option( $prefix . '-items-align' );

				$css_output = array(
					$selector                     => array(
						'--lineHeight'      => '1em',
						'--backgroundColor' => esc_attr( $bg_color ),
						'--padding'         => kemet_responsive_spacing( $menu_spacing, 'all', 'desktop' ),
						'--linksColor'      => esc_attr( $link_color ),
						'--linksHoverColor' => esc_attr( $link_h_color ),
						'--justifyContent'  => esc_attr( $align ),
						'justify-content'   => 'var(--justifyContent)',
					),
					$selector . ' > li'           => array(
						'display'         => 'inline-flex',
						'--itemsWidth'    => esc_attr( $items_width ),
						'width'           => 'var(--itemsWidth)',
						'justify-content' => 'var(--justifyContent)',
					),
					$selector . ' > li > a'       => array(
						'font-family'         => 'var(--fontFamily)',
						'--borderBottomWidth' => kemet_responsive_slider( $link_h_border_width, 'desktop' ),
						'--padding'           => kemet_responsive_spacing( $menu_link_spacing, 'all', 'desktop' ),
					),
					$selector . ' > li > a:hover' => array(
						'border-bottom-color' => 'var(--borderBottomColor, var(--linksHoverColor))',
						'--borderBottomColor' => esc_attr( $link_h_border_color ),
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
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $mobile, '', '544' );

				$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( $prefix, $selector . ' > li > a' );

				$dynamic_css .= $parse_css;
			}
			return $dynamic_css;
		}
	}
}

new Kemet_Footer_Menu_Dynamic_Css();


