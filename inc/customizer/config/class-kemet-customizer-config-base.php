<?php
/**
 * Kemet Theme Customizer Configuration Base.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2018, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.4.3
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Customizer Sanitizes
 *
 * @since 1.0.0
 */
if ( ! class_exists( 'Kemet_Customizer_Config_Base' ) ) {

	/**
	 * Customizer Sanitizes Initial setupsection
	 * 
	 */
	class Kemet_Customizer_Config_Base {

		/**
		 * Constructor
		 */
		public function __construct() {
			add_filter( 'kemet_customizer_configurations', array( $this, 'register_configuration' ), 30, 2 );
		}

		/**
		 * Base Method for Registering Customizer Configurations.
		 *
		 * @param Array                $configurations Kemet Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return Array Kemet Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {
			return $configurations;
		}

	}
}

/**
 * Kicking this off by calling 'get_instance()' method
 */
new Kemet_Customizer_Config_Base;