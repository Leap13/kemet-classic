<?php
/**
 * Buttons for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Buttons_Fields_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$btn_selector         = 'button, .button, .kmt-button, input[type=button], input[type=reset], input[type="submit"], .wp-block-button a.wp-block-button__link, .wp-block-search button.wp-block-search__button';
		$btn_hover_selector   = 'button:focus, .button:hover, button:hover, .kmt-button:hover, .button:hover, input[type=reset]:hover, input[type=reset]:focus, input#submit:hover, input#submit:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="submit"]:hover, input[type="submit"]:focus, .button:focus, .button:focus, .wp-block-button a.wp-block-button__link:hover, .wp-block-search button.wp-block-search__button:hover';
		$input_selector       = 'input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="reset"], input[type="search"], textarea, select, .wpcf7 form input:not([type=submit])';
		$input_focus_selector = 'input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="reset"]:focus, input[type="search"]:focus, textarea:focus, select:focus, .wpcf7 form input:not([type=submit]):focus';
		$register_options     = array(
			'buttons-tabs' => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							'kmt-buttons'         => array(
								'type'     => 'kmt-title',
								'label'    => __( 'Buttons Style', 'kemet' ),
								'priority' => 1,
							),
							'button-effect'       => array(
								'type'      => 'kmt-switcher',
								'transport' => 'postMessage',
								'label'     => __( 'Button Shadow', 'kemet' ),
							),
							'button-hover-effect' => array(
								'type'      => 'kmt-switcher',
								'transport' => 'postMessage',
								'label'     => __( 'Button Hover Shadow', 'kemet' ),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							'kmt-buttons'        => array(
								'type'     => 'kmt-title',
								'label'    => __( 'Buttons Style', 'kemet' ),
								'priority' => 1,
							),


							// 'go-top-border'       => array(
							// 	'transport'   => 'postMessage',
							// 	'secondColor' => true,
							// 	'divider'     => true,
							// 	'type'        => 'kmt-border',
							// 	'label'       => __( 'Border', 'kemet' ),
							// 	'preview'     => array(
							// 		'selector' => '#kmt-go-top',
							// 		'property' => 'border',
							// 	),
							// ),
							'buttons-shadow'        => array(
								'type'     => 'kmt-box-shadow',
								'transport'   => 'postMessage',
								//'secondColor' => true,
								//'responsive'   => true,
								'label'    => __( 'Box Shadow', 'kemet' ),
								'priority' => 1,
					            'preview'     => array(
									'selector' => $btn_selector,
									'property' => 'box-shadow',
									'responsive'   => true,
								),
							),
							'buttons-typography' => array(
								'type'      => 'kmt-typography',
								'label'     => __( 'Typography', 'kemet' ),
								'transport' => 'postMessage',
								'preview'   => array(
									'selector' => $btn_selector,
								),
							),
							'button-text-color'  => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'divider'   => true,
								'label'     => __( 'Text Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Initial', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Hover', 'kemet' ),
										'id'    => 'hover',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $btn_selector,
										'property' => '--buttonColor',
									),
									'hover'   => array(
										'selector' => $btn_hover_selector,
										'property' => '--buttonHoverColor',
									),
								),
							),
							'button-bg-color'    => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Background Color', 'kemet' ),
								'section'   => 'section-buttons-fields',
								'pickers'   => array(
									array(
										'title' => __( 'Initial', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Hover', 'kemet' ),
										'id'    => 'hover',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $btn_selector,
										'property' => '--buttonBackgroundColor',
									),
									'hover'   => array(
										'selector' => $btn_hover_selector,
										'property' => '--buttonBackgroundHoverColor',
									),
								),
							),
							'btn-border-size'    => array(
								'type'           => 'kmt-spacing',
								'transport'      => 'postMessage',
								'linked_choices' => true,
								'divider'        => true,
								'responsive'     => false,
								'label'          => __( 'Border Size', 'kemet' ),
								'unit_choices'   => array( 'px', 'em' ),
								'choices'        => array(
									'top'    => __( 'Top', 'kemet' ),
									'right'  => __( 'Right', 'kemet' ),
									'bottom' => __( 'Bottom', 'kemet' ),
									'left'   => __( 'Left', 'kemet' ),
								),
								'preview'        => array(
									'selector' => $btn_selector,
									'property' => '--borderWidth',
									'sides'    => false,
								),
							),
							'btn-border-color'   => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Border Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Initial', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Hover', 'kemet' ),
										'id'    => 'hover',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $btn_selector,
										'property' => '--borderColor',
									),
									'hover'   => array(
										'selector' => $btn_hover_selector,
										'property' => '--borderHoverColor',
									),
								),
							),
							'button-radius'      => array(
								'type'           => 'kmt-spacing',
								'transport'      => 'postMessage',
								'responsive'     => true,
								'label'          => __( 'Border Radius', 'kemet' ),
								'linked_choices' => true,
								'unit_choices'   => array( 'px', 'em', '%' ),
								'choices'        => array(
									'top'    => __( 'Top', 'kemet' ),
									'right'  => __( 'Right', 'kemet' ),
									'bottom' => __( 'Bottom', 'kemet' ),
									'left'   => __( 'Left', 'kemet' ),
								),
								'preview'        => array(
									'selector'   => $btn_selector,
									'property'   => '--borderRadius',
									'sides'      => false,
									'responsive' => true,
								),
							),
							'button-spacing'     => array(
								'type'           => 'kmt-spacing',
								'transport'      => 'postMessage',
								'responsive'     => true,
								'divider'        => true,
								'priority'       => 80,
								'label'          => __( 'Padding', 'kemet' ),
								'linked_choices' => true,
								'unit_choices'   => array( 'px', 'em', '%' ),
								'choices'        => array(
									'top'    => __( 'Top', 'kemet' ),
									'right'  => __( 'Right', 'kemet' ),
									'bottom' => __( 'Bottom', 'kemet' ),
									'left'   => __( 'Left', 'kemet' ),
								),
								'preview'        => array(
									'selector'   => $btn_selector,
									'property'   => '--padding',
									'responsive' => true,
									'sides'      => false,
								),
							),
							'kmt-input-color'    => array(
								'type'  => 'kmt-title',
								'label' => __( 'Input Fields Style', 'kemet' ),
							),
							'inputs-typography'  => array(
								'type'      => 'kmt-typography',
								'label'     => __( 'Typography', 'kemet' ),
								'transport' => 'postMessage',
								'preview'   => array(
									'selector' => $input_selector,
								),
							),
							'input-text-color'   => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'divider'   => true,
								'label'     => __( 'Text Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Initial', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Focus', 'kemet' ),
										'id'    => 'focus',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $input_selector,
										'property' => '--inputColor',
									),
									'focus'   => array(
										'selector' => $input_focus_selector,
										'property' => '--inputFocusColor',
									),
								),
							),
							'input-bg-color'     => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Background Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Initial', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Focus', 'kemet' ),
										'id'    => 'focus',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $input_selector,
										'property' => '--inputBackgroundColor',
									),
									'focus'   => array(
										'selector' => $input_focus_selector,
										'property' => '--inputFocusBackgroundColor',
									),
								),
							),
							'input-label-color'  => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Label Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Initial', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => 'form label',
										'property' => '--textColor',
									),
								),
							),
							'input-radius'       => array(
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'divider'      => true,
								'transport'    => 'postMessage',
								'section'      => 'section-buttons-fields',
								'priority'     => 150,
								'label'        => __( 'Border Radius', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 100,
									),
									'%'  => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 100,
									),
								),
								'preview'      => array(
									'selector'   => $input_selector,
									'property'   => '--inputBorderRadius',
									'responsive' => true,
								),
							),
							'input-border-size'  => array(
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'transport'    => 'postMessage',
								'section'      => 'section-buttons-fields',
								'priority'     => 155,
								'label'        => __( 'Border Size', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 100,
									),
								),
								'preview'      => array(
									'selector'   => $input_selector,
									'property'   => '--inputBorderWidth',
									'responsive' => true,
								),
							),
							'input-border-color' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Border Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Initial', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Focus', 'kemet' ),
										'id'    => 'focus',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $input_selector,
										'property' => '--inputBorderColor',
									),
									'focus'   => array(
										'selector' => $input_focus_selector,
										'property' => '--inputFocusBorderColor',
									),
								),
							),
							'input-spacing'      => array(
								'type'           => 'kmt-spacing',
								'transport'      => 'postMessage',
								'responsive'     => true,
								'divider'        => true,
								'section'        => 'section-buttons-fields',
								'priority'       => 160,
								'label'          => __( 'Padding', 'kemet' ),
								'linked_choices' => true,
								'unit_choices'   => array( 'px', 'em', '%' ),
								'choices'        => array(
									'top'    => __( 'Top', 'kemet' ),
									'right'  => __( 'Right', 'kemet' ),
									'bottom' => __( 'Bottom', 'kemet' ),
									'left'   => __( 'Left', 'kemet' ),
								),
								'preview'        => array(
									'selector'   => $input_selector,
									'property'   => '--padding',
									'sides'      => false,
									'responsive' => true,
								),
							),
						),
					),
				),
			),

		);
		$register_options = array(
			'buttons-options' => array(
				'section' => 'section-buttons-fields',
				'type'    => 'kmt-options',
				'data'    => array(
					'options' => $register_options,
				),
			),
		);
		return array_merge( $options, $register_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$register_sections = array(
			'section-buttons-fields' => array(
				'priority' => 50,
				'title'    => __( 'Buttons & Fields', 'kemet' ),
			),
		);

		return array_merge( $sections, $register_sections );
	}
}

new Kemet_Buttons_Fields_Customizer();
