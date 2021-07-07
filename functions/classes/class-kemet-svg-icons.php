<?php
/**
 * Icons for Kemet theme.
 *
 * @package     Kemet
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2020, Brainstorm Force
 * @link        https://www.brainstormforce.com
 * @since       Kemet 1.2
 */

/**
 * Icons Initial Setup
 *
 * @since 1.2
 */
class Kemet_Svg_Icons {
	/**
	 * Constructor function that initializes required actions and hooks
	 */
	public function __construct() {

	}


	/**
	 * Get SVG icons.
	 * Returns the SVG icon you want to display.
	 *
	 * @since 1.2
	 *
	 * @param string  $icon Key for the SVG you want to load.
	 * @param boolean $is_echo whether to echo the output or return.
	 * @param boolean $replace load close markup for SVG.
	 * @param string  $menu_location Creates dynamic filter for passed parameter.
	 *
	 * @return string SVG for passed key.
	 */
	public static function get_icons( $icon, $is_echo = false, $replace = false, $menu_location = 'main' ) {
		$output = '';
			switch ( $icon ) {

                case 'dropdown-menu':
					$output = '<svg data-name="Layer 1" viewBox="0 0 42.45 23.35" xmlns="http://www.w3.org/2000/svg">
                    <path transform="translate(-26.25 -35.85)" d="M64.5,36.6l-17,17-17-17a2.61,2.61,0,0,0-3.5,0,2.42,2.42,0,0,0,0,3.5L45.1,58.2a3.38,3.38,0,0,0,4.8,0L68,40a2.34,2.34,0,0,0,.7-1.7,2.45,2.45,0,0,0-4.2-1.7Z"/>
                    </svg>';
					break;
				default:
					$output = '';
					break;
			}

			// if ( $replace ) {
			// 	$output .= '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="18px" height="18px" viewBox="-63 -63 140 140" enable-background="new -63 -63 140 140" xml:space="preserve">
            //     <path id="Shape" d="M75.133-47.507L61.502-61.133L7-6.625l-54.507-54.507l-13.625,13.625L-6.625,7l-54.507,54.503l13.625,13.63     L7,20.631l54.502,54.502l13.631-13.63L20.63,7L75.133-47.507z"/></svg>';
			// }
			if ( 'menu-bars' === $icon ) {
				$menu_icon = apply_filters( 'kemet_' . $menu_location . '_menu_toggle_icon', 'menu-toggle-icon' );
				$output    = '<span class="' . esc_attr( $menu_icon ) . '"></span>';
                $output   .= '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="20px" height="20px" viewBox="57 41.229 26 18.806" enable-background="new 57 41.229 26 18.806" xml:space="preserve">
                <path d="M82.5,41.724h-25v3.448h25V41.724z M57.5,48.907h25v3.448h-25V48.907z M82.5,56.092h-25v3.448h25V56.092z"/>
                </svg>';
			}

		$output = apply_filters( 'kemet_svg_icon_element', $output, $icon );

		$classes = array(
			'kmt-svg-icon',
			'icon-' . $icon,
		);

		$output = sprintf(
			'<span class="%1$s">%2$s</span>',
			implode( ' ', $classes ),
			$output
		);

		if ( ! $is_echo ) {
			return apply_filters( 'kemet_svg_icon', $output, $icon );
		}

		echo apply_filters( 'kemet_svg_icon', $output, $icon ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
new Kemet_Svg_Icons();
