<?php
/**
 * Icons for Kemet theme.
 *
 * @package     Kemet
 * @author      Leap13
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
	 *
	 * @return string SVG for passed key.
	 */
	public static function get_icons( $icon, $is_echo = false ) {
		$output = '';
		switch ( $icon ) {

			case 'dropdown-menu':
					$output = '<svg width="9" height="9" data-name="Layer 1" viewBox="0 0 42.45 23.35" xmlns="http://www.w3.org/2000/svg">
                    <path transform="translate(-26.25 -35.85)" d="M64.5,36.6l-17,17-17-17a2.61,2.61,0,0,0-3.5,0,2.42,2.42,0,0,0,0,3.5L45.1,58.2a3.38,3.38,0,0,0,4.8,0L68,40a2.34,2.34,0,0,0,.7-1.7,2.45,2.45,0,0,0-4.2-1.7Z"/>
                    </svg>';
				break;
			case 'search':
				$output = '<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="21.5" height="21.5" viewBox="0 0 21.5 21.5"><title>search</title><path d="M22.53,21.47l-3.28-3.28a10.28,10.28,0,1,0-1.06,1.06l3.28,3.28a.75.75,0,0,0,1.06,0A.75.75,0,0,0,22.53,21.47ZM2.75,11.5a8.75,8.75,0,1,1,8.75,8.75A8.77,8.77,0,0,1,2.75,11.5Z" transform="translate(-1.25 -1.25)"/></svg>';
				break;
			case 'author':
				$output = '<svg width="13" height="13" data-name="Layer 1" viewBox="0 0 86.5 90" xmlns="http://www.w3.org/2000/svg">
					<path transform="translate(-4.3 -2.5)" d="M47.5,50A23.75,23.75,0,1,0,23.8,26.2,23.69,23.69,0,0,0,47.5,50Zm0-42.6A18.8,18.8,0,1,1,28.7,26.2,18.78,18.78,0,0,1,47.5,7.4Z"/>
					<path transform="translate(-4.3 -2.5)" d="m47.5 56.9c-35.5 0-43.2 17.8-43.2 24.7a10.89 10.89 0 0 0 11.1 10.9h64.3a11 11 0 0 0 11.1-10.9c-0.1-6.9-7.8-24.7-43.3-24.7zm32.1 30.7h-64.2a6 6 0 0 1-6.2-6c0-5.1 7-19.8 38.3-19.8s38.3 14.7 38.3 19.8a6 6 0 0 1-6.2 6z"/>
					</svg>';
				break;
			case 'category':
				$output = '<svg width="13" height="13" data-name="Layer 1" viewBox="0 0 89.91 71.1" xmlns="http://www.w3.org/2000/svg">
					<path transform="translate(-3 -12.5)" d="M5.5,17.5H90.4a2.5,2.5,0,0,0,0-5H5.5a2.5,2.5,0,0,0,0,5Z"/>
					<path transform="translate(-3 -12.5)" d="M5.5,39.5H68.4a2.5,2.5,0,0,0,0-5H5.5A2.42,2.42,0,0,0,3,37,2.48,2.48,0,0,0,5.5,39.5Z"/>
					<path transform="translate(-3 -12.5)" d="m90.5 56.5h-85a2.5 2.5 0 0 0 0 5h84.9a2.48 2.48 0 0 0 2.5-2.5 2.34 2.34 0 0 0-2.4-2.5z"/>
					<path transform="translate(-3 -12.5)" d="M68.4,78.5H5.5A2.48,2.48,0,0,0,3,81a2.56,2.56,0,0,0,2.5,2.6H68.4A2.5,2.5,0,0,0,70.9,81,2.42,2.42,0,0,0,68.4,78.5Z"/>
					</svg>';
				break;
			case 'comment':
				$output = '<svg width="13" height="13" data-name="Layer 1" viewBox="0 0 90 69" xmlns="http://www.w3.org/2000/svg">
					<path transform="translate(-2.5 -13)" d="M87.1,59a22.93,22.93,0,0,0,5.4-14.6c0-13.8-12.9-25-28.7-25a31.45,31.45,0,0,0-4.4.3A38.47,38.47,0,0,0,37.6,13C18.2,13,2.5,26.7,2.5,43.6A28.5,28.5,0,0,0,9,61.4l.1.1c1,1.2,1.5,1.7,1.7,1.9a2.84,2.84,0,0,1,.9,2.1l-2.2,12c-.5,2.5.8,3.7,1.4,4a3.87,3.87,0,0,0,1.8.5,4.9,4.9,0,0,0,2.5-.8l11.4-7.7a3.53,3.53,0,0,1,1.7-.4h.3a48.73,48.73,0,0,0,8.9,1.1,39.07,39.07,0,0,0,19.9-5.4,33.87,33.87,0,0,0,6.4.6,39,39,0,0,0,7.3-.9h.2a1.8,1.8,0,0,1,1.1.3L81.6,75a4.26,4.26,0,0,0,2.3.8,3.11,3.11,0,0,0,1.7-.5,3.41,3.41,0,0,0,1.3-3.7L85.1,62a2.42,2.42,0,0,1,.6-1.3A8.22,8.22,0,0,1,87.1,59ZM37.6,69.2a45.28,45.28,0,0,1-7.9-1,8.38,8.38,0,0,0-5.8,1.1l-9,6.1,1.2-6.6.5-2.5a7.86,7.86,0,0,0-2.4-6.6s-.3-.3-1.1-1.3l-.1-.2A21.9,21.9,0,0,1,7.4,43.6C7.4,29.5,20.9,18,37.6,18S67.8,29.5,67.8,43.6,54.2,69.2,37.6,69.2ZM83.3,55.9c-.6.7-.9,1-1,1.1l-.4.4-.1.1h0a6.8,6.8,0,0,0-1.7,5.3L81.2,69l-6.3-4.2a7,7,0,0,0-3.8-1.1,4.87,4.87,0,0,0-1.2.1,33.3,33.3,0,0,1-6.2.8h-.6a28.39,28.39,0,0,0,9.5-20.9,28,28,0,0,0-7.9-19.3c12.7.4,22.8,9.3,22.8,20.1A17.34,17.34,0,0,1,83.3,55.9Z"/>
					</svg>';
				break;
			case 'tags':
				$output = '<svg width="13" height="13" data-name="Layer 1" viewBox="0 0 90 90" xmlns="http://www.w3.org/2000/svg">
					<path transform="translate(-2.5 -2.5)" d="m67.4 17.1a10.5 10.5 0 1 0 10.5 10.5 10.59 10.59 0 0 0-10.5-10.5zm0 16.1a5.6 5.6 0 0 1 0-11.2 6 6 0 0 1 4 1.6 5.51 5.51 0 0 1 1.6 4 5.66 5.66 0 0 1-5.6 5.6z"/>
					<path transform="translate(-2.5 -2.5)" d="M87.9,17,78,7.1A17.88,17.88,0,0,0,66.7,2.5h-.5L52.9,3A20.11,20.11,0,0,0,41.3,8.1L7.7,41.6A18.11,18.11,0,0,0,7.7,67L28,87.3a17.76,17.76,0,0,0,12.7,5.2,18.19,18.19,0,0,0,12.7-5.2L87,53.7a19.37,19.37,0,0,0,5-11.6l.5-13.4A18.28,18.28,0,0,0,87.9,17Zm-.8,25a15.19,15.19,0,0,1-3.6,8.3L49.9,83.8a13,13,0,0,1-9.2,3.8,12.61,12.61,0,0,1-9.2-3.8L11.2,63.5a12.77,12.77,0,0,1-3.8-9.2,13,13,0,0,1,3.8-9.2L44.8,11.5A14.89,14.89,0,0,1,53,7.9l13.4-.5h.2a12.4,12.4,0,0,1,7.8,3.2l9.9,9.9a12.87,12.87,0,0,1,3.2,8.1Z"/>
					</svg>';
				break;
			case 'date':
				$output = '<svg width="13" height="13" data-name="Layer 1" viewBox="0 0 90 84.3" xmlns="http://www.w3.org/2000/svg">
					<path transform="translate(-2.5 -5.3)" d="m24.6 45.3h3.2a4 4 0 0 0 4-4v-3.2a4 4 0 0 0-4-4h-3.2a4 4 0 0 0-4 4v3.2a4 4 0 0 0 4 4z"/>
					<path transform="translate(-2.5 -5.3)" d="m45.9 45.3h3.2a4 4 0 0 0 4-4v-3.2a4 4 0 0 0-4-4h-3.2a4 4 0 0 0-4 4v3.2a4 4 0 0 0 4 4z"/>
					<path transform="translate(-2.5 -5.3)" d="m67.2 45.3h3.2a4 4 0 0 0 4-4v-3.2a4 4 0 0 0-4-4h-3.2a4 4 0 0 0-4 4v3.2a3.89 3.89 0 0 0 4 4z"/>
					<path transform="translate(-2.5 -5.3)" d="m24.6 61.4h3.2a4 4 0 0 0 4-4v-3.2a4 4 0 0 0-4-4h-3.2a4 4 0 0 0-4 4v3.2a4 4 0 0 0 4 4z"/>
					<path transform="translate(-2.5 -5.3)" d="m45.9 61.4h3.2a4 4 0 0 0 4-4v-3.2a4 4 0 0 0-4-4h-3.2a4 4 0 0 0-4 4v3.2a4 4 0 0 0 4 4z"/>
					<path transform="translate(-2.5 -5.3)" d="m67.2 61.4h3.2a4 4 0 0 0 4-4v-3.2a4 4 0 0 0-4-4h-3.2a4 4 0 0 0-4 4v3.2a3.89 3.89 0 0 0 4 4z"/>
					<path transform="translate(-2.5 -5.3)" d="m67.2 77.5h3.2a4 4 0 0 0 4-4v-3.2a4 4 0 0 0-4-4h-3.2a4 4 0 0 0-4 4v3.2a3.89 3.89 0 0 0 4 4z"/>
					<path transform="translate(-2.5 -5.3)" d="m24.6 77.5h3.2a4 4 0 0 0 4-4v-3.2a4 4 0 0 0-4-4h-3.2a4 4 0 0 0-4 4v3.2a4 4 0 0 0 4 4z"/>
					<path transform="translate(-2.5 -5.3)" d="m45.9 77.5h3.2a4 4 0 0 0 4-4v-3.2a4 4 0 0 0-4-4h-3.2a4 4 0 0 0-4 4v3.2a4 4 0 0 0 4 4z"/>
					<path transform="translate(-2.5 -5.3)" d="M80.6,5.3H14.4A11.86,11.86,0,0,0,2.5,17.2V77.7A11.86,11.86,0,0,0,14.4,89.6H80.6A11.86,11.86,0,0,0,92.5,77.7V17.2A11.93,11.93,0,0,0,80.6,5.3Zm7,72.5a7,7,0,0,1-7,7H14.4a7,7,0,0,1-7-7v-51H87.6Zm0-55.9H7.4V17.3a7,7,0,0,1,7-7H80.6a7,7,0,0,1,7,7Z"/>
					</svg>';
				break;
			case 'menu':
				$output = '<svg height="1.5em" viewBox="0 -53 384 384" width="1.5em" xmlns="http://www.w3.org/2000/svg">
					<path d="m368 154.667969h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/>
					<path d="m368 32h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/>
					<path d="m368 277.332031h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/></svg>';
				break;
			case 'close':
				$output = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24" version="1.1">
					<path d="M 23.648438 21.964844 C 24.070312 22.4375 24.046875 23.15625 23.601562 23.601562 C 23.15625 24.046875 22.4375 24.070312 21.964844 23.648438 L 12 13.683594 L 2.035156 23.648438 C 1.5625 24.070312 0.84375 24.046875 0.398438 23.601562 C -0.046875 23.15625 -0.0703125 22.4375 0.351562 21.964844 L 10.316406 12 L 0.351562 2.035156 C 0.0195312 1.742188 -0.121094 1.289062 -0.015625 0.855469 C 0.0898438 0.425781 0.425781 0.0898438 0.855469 -0.015625 C 1.289062 -0.121094 1.742188 0.0195312 2.035156 0.351562 L 12 10.316406 L 21.964844 0.351562 C 22.4375 -0.0703125 23.15625 -0.046875 23.601562 0.398438 C 24.046875 0.84375 24.070312 1.5625 23.648438 2.035156 L 13.683594 12 Z M 23.648438 21.964844 "/>
					</svg>';
				break;
			case 'long_arrow_top':
				$output = '<svg id="Outline" xmlns="http://www.w3.org/2000/svg" width="12.01" height="14" viewBox="0 0 12.01 14"><title>long-arrow-top</title>
					<path d="M6.29,10.88a1,1,0,0,0,1.42,0L11,7.59V18a1,1,0,0,0,2,0V7.59l3.29,3.29a1,1,0,0,0,1.44-1.39l0,0L14.12,5.88a3,3,0,0,0-4.24,0h0L6.29,9.47A1,1,0,0,0,6.29,10.88Z" transform="translate(-6 -5)"/>
					</svg>';
				break;
			case 'arrow-left':
				$output = '<svg id="Outline" xmlns="http://www.w3.org/2000/svg" width="7.16" height="13.98" viewBox="0 0 7.16 13.98"><title>arrow-left</title><path d="M10.6,12.71a1,1,0,0,1,0-1.42l4.59-4.58a1,1,0,0,0-1.42-1.42L9.19,9.88a3,3,0,0,0,0,4.24l4.58,4.59a1,1,0,0,0,1.42-1.42Z" transform="translate(-8.31 -5.01)"/></svg>';
				break;
			case 'arrow-right':
				$output = '<svg id="Outline" xmlns="http://www.w3.org/2000/svg" width="7.17" height="13.97" viewBox="0 0 7.17 13.97"><title>arrow-right</title><path d="M15.4,9.88,10.81,5.29A1,1,0,0,0,9.4,6.71L14,11.29a1,1,0,0,1,0,1.42L9.4,17.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.41,0l4.59-4.59A3,3,0,0,0,15.4,9.88Z" transform="translate(-9.11 -5.03)"/></svg>';
				break;
			case 'arrow-up':
				$output = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
						<path d="M7 13l4.030-6 3.97 6h-8z"></path>
					</svg>';
				break;
			case 'arrow-up-alt':
				$output = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
						<path d="M11 18h-2v-12l-4 4-2-1 7-7 7 7-2 1-4-4v12z"></path>
					</svg>';
				break;
			case 'arrow-up-alt2':
				$output = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
						<path d="M15 14l-5-5-5 5-2-1 7-7 7 7z"></path>
					</svg>';
				break;
			case 'cart':
				$output = '<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 18.36 17.94"><title>shopping-cart</title><g id="Shopping_Cart" data-name="Shopping Cart"><path d="M8,16.82A2.39,2.39,0,0,1,5.6,14.63L4.77,4.75,3.44,4.52A.75.75,0,0,1,3.7,3l1.89.33a.74.74,0,0,1,.62.68l.21,2.49c13,0,13,0,13.07,0a2,2,0,0,1,1.67,2.23l-.87,6a2.39,2.39,0,0,1-2.36,2.05H8ZM6.55,8l.54,6.46a.9.9,0,0,0,.89.82h10a.89.89,0,0,0,.88-.76l.86-6a.47.47,0,0,0-.4-.54c-.19,0-8,0-12.72,0" transform="translate(-2.82 -3.03)"/><path class="cls-1" d="M16.46,11.41H13.94a.75.75,0,0,1,0-1.5h2.52a.75.75,0,0,1,0,1.5" transform="translate(-2.82 -3.03)"/><path class="cls-1" d="M8.83,19.72A1.25,1.25,0,0,1,7.58,21a1.27,1.27,0,0,1-.88-.36,1.32,1.32,0,0,1-.37-.88,1.25,1.25,0,0,1,2.5,0Z" transform="translate(-2.82 -3.03)"/><path class="cls-1" d="M19.11,19.72A1.26,1.26,0,0,1,17.86,21a1.25,1.25,0,1,1,1.25-1.25Z" transform="translate(-2.82 -3.03)"/></g></svg>';
				break;
			case 'bag':
				$output = '<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 17.5 19.5"><title>modern-bag-outline</title><path id="Modern_Bag_Outline" data-name="Modern Bag Outline" d="M18.42,9.25,18.34,9a5.52,5.52,0,0,0-4.13-3.89,4.58,4.58,0,0,0-.05-1.69A4,4,0,0,0,10.88.33l-.11,0a5,5,0,0,0-1.54,0l-.11,0A4,4,0,0,0,5.84,3.39a4.58,4.58,0,0,0,0,1.69A5.52,5.52,0,0,0,1.66,9l-.08.28A9.47,9.47,0,0,0,2,15.33l.09.23A6.52,6.52,0,0,0,7.1,19.47l.75.11a13.48,13.48,0,0,0,4.3,0l.75-.11a6.52,6.52,0,0,0,5-3.91l.09-.23A9.47,9.47,0,0,0,18.42,9.25ZM7.31,3.71a2.52,2.52,0,0,1,2.06-1.9l.12,0a3.49,3.49,0,0,1,1,0l.12,0a2.52,2.52,0,0,1,2.06,1.9,3.25,3.25,0,0,1,.05,1.12,20.11,20.11,0,0,0-5.48,0A3.25,3.25,0,0,1,7.31,3.71Zm9.34,11.05-.09.23a5,5,0,0,1-3.89,3l-.75.11a12.36,12.36,0,0,1-3.84,0L7.33,18a5,5,0,0,1-3.89-3l-.09-.23A8,8,0,0,1,3,9.64l.08-.28A4,4,0,0,1,6.22,6.52h0l.12.29a.76.76,0,0,0,1,.39.75.75,0,0,0,.41-.91,17.83,17.83,0,0,1,4.5,0,.75.75,0,0,0,.41.91.76.76,0,0,0,1-.39l.12-.29h0a4,4,0,0,1,3.11,2.84l.08.28A8,8,0,0,1,16.65,14.76Z" transform="translate(-1.25 -0.25)"/></svg>';
				break;
			case 'bag-fill':
				$output = '<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 17.37 19.53"><title>modern-bag-fill</title><path id="Modern_Bag_Fill" data-name="Modern Bag Fill" class="cls-1" d="M18.36,9.25,18.28,9a5.51,5.51,0,0,0-4.07-3.89,5,5,0,0,0-.06-1.69A4,4,0,0,0,10.89.32l-.12,0A4.43,4.43,0,0,0,9.23.3l-.12,0A4,4,0,0,0,5.85,3.39a5,5,0,0,0-.06,1.69A5.51,5.51,0,0,0,1.72,9l-.08.28A9.6,9.6,0,0,0,2,15.33l.1.23a6.47,6.47,0,0,0,5,3.92l.74.12a14,14,0,0,0,4.28,0l.74-.12a6.47,6.47,0,0,0,5-3.92l.1-.23A9.6,9.6,0,0,0,18.36,9.25ZM12.67,4.81a19.89,19.89,0,0,0-5.34,0,3.83,3.83,0,0,1,0-1.12,2.45,2.45,0,0,1,2-1.87l.12,0a2.69,2.69,0,0,1,1,0l.12,0a2.45,2.45,0,0,1,2,1.87A3.83,3.83,0,0,1,12.67,4.81Z" transform="translate(-1.31 -0.23)"/></svg>';
				break;
			case 'dcart':
				$output = '<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 18.14 18.13"><title>shopping-cart-filled</title><path id="Shopping_Cart_Filled" data-name="Shopping Cart Filled" d="M16.67,19.67a1.37,1.37,0,1,1,2.74,0,1.37,1.37,0,1,1-2.74,0m-10.2,0a1.38,1.38,0,1,1,1.38,1.4,1.4,1.4,0,0,1-1.38-1.4M8,16.8a2.27,2.27,0,0,1-1.57-.62,2.42,2.42,0,0,1-.74-1.55L4.86,4.55,3.49,4.31a.7.7,0,0,1,.13-1.38h.11l2.16.33a.69.69,0,0,1,.56.63L6.62,6a.56.56,0,0,0,.55.52H19.41a1.56,1.56,0,0,1,1.28.62A2,2,0,0,1,21,8.7l-.86,6.07a2.34,2.34,0,0,1-2.29,2Zm5.24-6.19a.7.7,0,0,0,.68.7h2.51a.7.7,0,0,0,.68-.7.67.67,0,0,0-.67-.69H13.92a.67.67,0,0,0-.68.68Z" transform="translate(-2.93 -2.93)"/></svg>';
				break;
			case 'view-fill':
				$output = '<svg data-name="Layer 1" width="23.41" height="24" viewBox="0 0 92 90" xmlns="http://www.w3.org/2000/svg"><path transform="translate(-30 -30)" d="M79.2,25.6C73.7,20.5,62.2,12,47.5,12S21.3,20.6,15.8,25.6C7.9,32.8,2.5,41.8,2.5,47.5S7.9,62.2,15.8,69.4c5.5,5.1,17,13.7,31.7,13.7s26.2-8.6,31.7-13.6C87,62.3,92.5,53.3,92.5,47.6S87.1,32.8,79.2,25.6ZM47.5,78.1C25.6,78.1,7.4,55.9,7.4,47.5S25.6,16.9,47.5,16.9,87.6,39.1,87.6,47.5,69.4,78.1,47.5,78.1Z"/><path transform="translate(-2.5 -12)" d="m47.5 28.5a19 19 0 1 0 19 19 19 19 0 0 0-19-19zm0 33.1a14.1 14.1 0 1 1 14.1-14.1 14.08 14.08 0 0 1-14.1 14.1z"/></svg>';
				break;
			case 'view':
				$output = '<svg data-name="Layer 1" width="24.02" height="24.02" viewBox="0 0 90.1 61.45" xmlns="http://www.w3.org/2000/svg"><g data-name=" -Round- -Image- -remove red eye"><path d="M45.05,0A48.44,48.44,0,0,0,0,30.71a48.39,48.39,0,0,0,90.1,0A48.44,48.44,0,0,0,45.05,0Zm0,51.19A20.48,20.48,0,1,1,65.53,30.71h0A20.5,20.5,0,0,1,45.05,51.18Zm0-32.76A12.29,12.29,0,1,0,57.34,30.72h0A12.27,12.27,0,0,0,45.08,18.43Z" data-name=" -Icon-Color"/></g></svg>';
				break;
			default:
				$output = '';
				break;
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
