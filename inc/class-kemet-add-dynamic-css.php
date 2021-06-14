<?php
/**
 * Kemet Add Dynamic Css
 *
 * @package Kemet Theme
 */

if ( ! class_exists( 'Kemet_Add_Dynamic_Css' ) ) :

	/**
	 * Customizer Register
	 */
	class Kemet_Add_Dynamic_Css {

		/**
		 * Constructor
		 */
		public function __construct() {
			add_filter( 'kemet_dynamic_css', array( $this, 'dynamic_css' ) );
		}

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css css.
		 * @return string
		 */
		public function dynamic_css( $dynamic_css ) {

			return $dynamic_css;
		}
	}
endif;
