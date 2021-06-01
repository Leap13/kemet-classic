<?php
/**
 * General Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2018, Kemet
 * @link        http://wpawiz.com/
 * @since       Kemet 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Kemet_Header_Layout_Configs' ) ) {

	/**
	 * Register Header Layout Customizer Configurations.
	 */
	class Kemet_Header_Layout_Configs extends Kemet_Customizer_Config_Base {

		/**
		 * Register Header Layout Customizer Configurations.
		 *
		 * @param Array                $configurations Kemet Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return Array Kemet Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {


			$_configs = array(

				/**
				 * Option: Header Layout
				 */
                array(
                    'name'           => KEMET_THEME_SETTINGS . '[header-padding]',
                    'type'           => 'control',
                    'control'        => 'kmt-responsive-spacing',
                    'section'        => 'section-header',
                    'priority'       => 90,
                    'label'          => __( 'Paddingnnn', 'kemet' ),
                    'linked_choices' => true,
                    'unit_choices'   => array( 'px', 'em', '%' ),
                    'choices'        => array(
                        'top'    => __( 'Top', 'kemet' ),
                        'right'  => __( 'Right', 'kemet' ),
                        'bottom' => __( 'Bottom', 'kemet' ),
                        'left'   => __( 'Left', 'kemet' ),
                        ),
                        
                    )
            );

			$configurations = array_merge( $configurations, $_configs );

			return $configurations;
		}
	}
}


new Kemet_Header_Layout_Configs;