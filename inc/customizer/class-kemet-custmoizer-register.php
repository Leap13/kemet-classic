<?php
/**
 * Kemet Theme Customizer Register
 *
 * @package Kemet Theme
 */

if ( ! class_exists( 'Kemet_Customizer_Register' ) ) :

	/**
	 * Customizer Register
	 */
	class Kemet_Customizer_Register {

		/**
		 * Constructor
		 */
		public function __construct() {
			add_filter( 'kemet_customizer_options', array( $this, 'register_options' ), 10, 1 );
			add_filter( 'kemet_customizer_sections', array( $this, 'register_sections' ), 10, 1 );
			add_filter( 'kemet_customizer_panels', array( $this, 'register_panels' ), 10, 1 );
		}

		/**
		 * Register Customizer Options
		 *
		 * @param array $options options.
		 * @return array
		 */
		public function register_options( $options ) {
			return $options;
		}

		/**
		 * Register Customizer Sections
		 *
		 * @param array $sections sections.
		 * @return array
		 */
		public function register_sections( $sections ) {
			return $sections;
		}

		/**
		 * Register Panels
		 *
		 * @param array $panels panels.
		 * @return array
		 */
		public function register_panels( $panels ) {
			return $panels;
		}
	}
endif;
