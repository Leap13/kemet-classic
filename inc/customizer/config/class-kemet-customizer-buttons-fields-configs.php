<?php
/**
 * Kemet Theme Customizer Configuration Base.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2018, Kemet
 * @link        http://wpkemet.com/
 * @since       Kemet 1.4.3
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Customizer Sanitizes
 *
 * @since 1.4.3
 */
if ( ! class_exists( 'Kemet_Customizer_Buttons_fields_configs' ) ) {

	/**
	 * Register Button Customizer Configurations.
	 */
	class Kemet_Customizer_Button_Configs extends Kemet_Customizer_Config_Base {

		/**
		 * Register Button Customizer Configurations.
		 *
		 * @param Array                $configurations Kemet Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return Array Kemet Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$_configs = array(

				/**
				 * Option: Button Color
				 */
				array(
					'name'    => KEMET_THEME_SETTINGS . '[kmt-buttons]',
					'type'    => 'control',
					'control' => 'kmt-title',
                    'priority' => 1,
					'section' => 'section-buttons-fields',
					'title'   => __( 'Buttons style', 'kemet' ),
					'settings' => array(),
				),
				array(            
					'name'    => KEMET_THEME_SETTINGS . '[kmt-buttons]',                    
                    'default'    => '',
					'type'    => 'control',
					'control' => 'kmt-color',
					'priority' => '2',
					'section' => 'section-buttons-fields',
					'title'   => __( 'Button Text Color', 'kemet' ),
				),

				array(
					'name'      => KEMET_THEME_SETTINGS . '[button-color]',
					'default'   => kemet_get_option( 'button-color' ),
					'type'      => 'control',
					'control'   => 'kmt-color',
					'title'     => __( 'Text Color', 'astra' ),
					'section'   => 'section-buttons-fields',
					'transport' => 'postMessage',
					'priority'  => 18,
					'tab'          => __( 'Normal', 'kemet' ),
				),

///group control
/**
* Option: Colors
*/
$fields = array(

	/**
	* Option - Color
	*/
	array(
		'id'           => '[button-color]',
		'default'      => '',
		'type'         => 'option',
		'control_type' => 'kmt-color',
		'label'        => __( 'Text Color', 'kemet' ),
		'priority'     => 1,
		'section'      => 'section-buttons-fields',
		'tab'          => __( 'Normal', 'kemet' ),
	),
	/**
	* Option - Background Color
	*/
	array(
		'id'           => '[button-bg-color]',
		'default'      => '',
		'type'         => 'option',
		'control_type' => 'kmt-color',
		'label'        => __( 'Background Color', 'kemet' ),
		'priority'     => 1,
		'section'      => 'section-buttons-fields',
		'tab'          => __( 'Normal', 'kemet' ),
	),
	/**
	* Option - Color
	*/
	array(
		'id'           => '[btn-border-color]',
		'default'      => '',
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Border Color', 'kemet' ),
		'priority'     => 1,
		'section'      => 'section-buttons-fields',
		'tab'          => __( 'Normal', 'kemet' ),
	),
	/**
	* Option - Hover Color
	*/
	array(
		'id'           => '[button-h-color]',
		'default'      => '',
		'type'         => 'option',
		'control_type' => 'kmt-color',
		'label'        => __( 'Text Color', 'kemet' ),
		'priority'     => 2,
		'section'      => 'section-buttons-fields',
		'tab'          => __( 'Hover', 'kemet' ),
	),
	/**
	* Option - Background Hover Color
	*/
	array(
		'id'           => '[button-bg-h-color]',
		'default'      => '',
		'type'         => 'option',
		'control_type' => 'kmt-color',
		'label'        => __( 'Background Color', 'kemet' ),
		'priority'     => 2,
		'section'      => 'section-buttons-fields',
		'tab'          => __( 'Hover', 'kemet' ),
	),
	/**
	* Option - Hover Color
	*/
	array(
		'id'           => '[btn-border-h-color]',
		'default'      => '',
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Border Color', 'kemet' ),
		'priority'     => 2,
		'section'      => 'section-buttons-fields',
		'tab'          => __( 'Hover', 'kemet' ),
	),
),
$group_settings = array(
	'parent_id' => KEMET_THEME_SETTINGS . '[kmt-buttons-colors]',
	'type'      => 'kmt-group',
	'label'     => __( 'Buttons Colors', 'kemet' ),
	'section'   => 'section-buttons-fields',
	'priority'  => 5,
	'settings'  => array(),
),
new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields ),
/**
* Option: Typography
*/
$fields = array(
	/**
	* Option: Title Font Size
	*/
	array(
		'id'           => '[inputs-font-size]',
		'default'      => '',
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-buttons-fields',
		'priority'     => 1,
		'label'        => __( 'Font Size', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 1,
				'step' => 1,
				'max'  => 200,
			),
			'em' => array(
				'min'  => 0.1,
				'step' => 0.1,
				'max'  => 10,
			),
		),
	),
	/**
	* Option: Font Family
	*/
	array(
		'id'           => '[inputs-font-family]',
		'default'      => '',
		'type'         => 'option',
		'control_type' => 'kmt-font-family',
		'label'        => __( 'Font Family', 'kemet' ),
		'section'      => 'section-buttons-fields',
		'priority'     => 3,
		'connect'      => KEMET_THEME_SETTINGS . '[inputs-font-weight]',
	),
	/**
	* Option: Font Weight
	*/
	array(
		'id'           => '[inputs-font-weight]',
		'default'      => '',
		'type'         => 'option',
		'control_type' => 'kmt-font-weight',
		'label'        => __( 'Font Weight', 'kemet' ),
		'section'      => 'section-buttons-fields',
		'priority'     => 4,
		'connect'      => KEMET_THEME_SETTINGS . '[inputs-font-family]',
	),
	/**
	* Option: inputs Text Transform
	*/
	array(
		'id'           => '[inputs-text-transform]',
		'default'      => '',
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Text Transform', 'kemet' ),
		'section'      => 'section-buttons-fields',
		'priority'     => 5,
		'choices'      => array(
			''           => __( 'Default', 'kemet' ),
			'none'       => __( 'None', 'kemet' ),
			'capitalize' => __( 'Capitalize', 'kemet' ),
			'uppercase'  => __( 'Uppercase', 'kemet' ),
			'lowercase'  => __( 'Lowercase', 'kemet' ),
		),
	),
	/**
	* Option: inputs Font Style
	*/
	array(
		'id'           => '[inputs-font-style]',
		'default'      => '',
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Font Style', 'kemet' ),
		'section'      => 'section-buttons-fields',
		'priority'     => 5,
		'choices'      => array(
			'inherit' => __( 'Inherit', 'kemet' ),
			'normal'  => __( 'Normal', 'kemet' ),
			'italic'  => __( 'Italic', 'kemet' ),
			'oblique' => __( 'Oblique', 'kemet' ),
		),
	),
	/**
	* Option: inputs Line Height
	*/
	array(
		'id'           => '[inputs-line-height]',
		'default'      => '',
		'type'         => 'option',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-buttons-fields',
		'transport'    => 'postMessage',
		'priority'     => 6,
		'label'        => __( 'Line Height', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 100,
			),
			'em' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 10,
			),
		),
	),
	/**
	* Option: inputs Letter Spacing
	*/
	array(
		'id'           => '[inputs-letter-spacing]',
		'default'      => '',
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-buttons-fields',
		'priority'     => 7,
		'label'        => __( 'Letter Spacing', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 0.1,
				'step' => 0.1,
				'max'  => 10,
			),
		),
	),
),
$group_settings = array(
	'parent_id' => KEMET_THEME_SETTINGS . '[kmt-inputs-typography]',
	'type'      => 'kmt-group',
	'label'     => __( 'Typography', 'kemet' ),
	'section'   => 'section-buttons-fields',
	'priority'  => 51,
	'settings'  => array(),
),
new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields ),
				// array(
				// 	'name' => KEMET_THEME_SETTINGS . '[buttons-font-size]',
				// 	'default' => '',
				// 	'type' => 'control',
				// 	'control'  => 'kmt-responsive-slider',
				// 	'Priority' =>  5, 
				// 	'section' => 'section-buttons-fields',
				// 	'title'   => __('Button Tex t Color', 'kemet' ),

				// ),
				


				// /**
				//  * Option: Button Hover Color
				//  */
				// array(
				// 	'name'    => KEMET_THEME_SETTINGS . '[button-h-color]',
				// 	'default' => '',
				// 	'section' => 'section-buttons',
				// 	'type'    => 'control',
				// 	'control' => 'ast-color',
				// 	'title'   => __( 'Button Text Hover Color', 'kemet' ),
				// ),

				// /**
				//  * Option: Button Background Color
				//  */
				// array(
				// 	'name'    => KEMET_THEME_SETTINGS . '[button-bg-color]',
				// 	'default' => '',
				// 	'section' => 'section-buttons',
				// 	'type'    => 'control',
				// 	'control' => 'ast-color',
				// 	'title'   => __( 'Button Background Color', 'kemet' ),
				// ),

				// /**
				//  * Option: Button Background Hover Color
				//  */
				// array(
				// 	'name'    => KEMET_THEME_SETTINGS . '[button-bg-h-color]',
				// 	'section' => 'section-buttons',
				// 	'default' => '',
				// 	'type'    => 'control',
				// 	'control' => 'ast-color',
				// 	'title'   => __( 'Button Background Hover Color', 'kemet' ),
				// ),

				// /**
				//  * Option: Button Radius
				//  */
				// array(
				// 	'name'        => KEMET_THEME_SETTINGS . '[button-radius]',
				// 	'section'     => 'section-buttons',
				// 	'default'     => kemet_get_option( 'button-radius' ),
				// 	'type'        => 'control',
				// 	'control'     => 'number',
				// 	'title'       => __( 'Button Radius', 'kemet' ),
				// 	'input_attrs' => array(
				// 		'min'  => 0,
				// 		'step' => 1,
				// 		'max'  => 200,
				// 	),
				// ),

				// /**
				//  * Option: Vertical Padding
				//  */
				// array(
				// 	'name'        => KEMET_THEME_SETTINGS . '[button-v-padding]',
				// 	'section'     => 'section-buttons',
				// 	'default'     => kemet_get_option( 'button-v-padding' ),
				// 	'title'       => __( 'Vertical Padding', 'kemet' ),
				// 	'type'        => 'control',
				// 	'control'     => 'number',
				// 	'input_attrs' => array(
				// 		'min'  => 1,
				// 		'step' => 1,
				// 		'max'  => 200,
				// 	),
				// ),

				// /**
				//  * Option: Horizontal Padding
				//  */
				// array(
				// 	'name'        => KEMET_THEME_SETTINGS . '[button-h-padding]',
				// 	'section'     => 'section-buttons',
				// 	'default'     => kemet_get_option( 'button-h-padding' ),
				// 	'title'       => __( 'Horizontal Padding', 'kemet' ),
				// 	'type'        => 'control',
				// 	'control'     => 'number',
				// 	'input_attrs' => array(
				// 		'min'  => 1,
				// 		'step' => 1,
				// 		'max'  => 200,
				// 	),
				// ),
			);

			return array_merge( $configurations, $_configs );
		}
	}
}

/**
 * Kicking this off by calling 'get_instance()' method
 */
new Kemet_Customizer_Button_Configs;
