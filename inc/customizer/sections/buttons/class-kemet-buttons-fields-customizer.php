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
		
			
			
			'buttons-tabs'    => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							'button-effect'       => array(
								'type'      => 'kmt-switcher',
								'transport' => 'postMessage',
								'label'     => __( 'Button Effect', 'kemet' ),
							),
							'button-hover-effect' => array(
								'type'      => 'kmt-switcher',
								'transport' => 'postMessage',
								'label'     => __( 'Button Hover Effect', 'kemet' ),
							),
							'button-spacing'      => array(
								'type'           => 'kmt-spacing',
								'transport'      => 'postMessage',
								'responsive'     => true,
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
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							'buttons-font-size'      => array(
								'type'         => 'option',
								'transport'    => 'postMessage',
								'type'         => 'kmt-slider',
								'responsive'   => true,
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
								'preview'      => array(
									'selector'   => $btn_selector,
									'property'   => '--fontSize',
									'responsive' => true,
								),
							),
							
							'buttons-text-transform' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-select',
								'label'     => __( 'Text Transform', 'kemet' ),
								'choices'   => array(
									''           => __( 'Default', 'kemet' ),
									'none'       => __( 'None', 'kemet' ),
									'capitalize' => __( 'Capitalize', 'kemet' ),
									'uppercase'  => __( 'Uppercase', 'kemet' ),
									'lowercase'  => __( 'Lowercase', 'kemet' ),
								),
								'preview'   => array(
									'selector' => $btn_selector,
									'property' => '--textTransform',
								),
							),
							'buttons-font-style'     => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-select',
								'label'     => __( 'Font Style', 'kemet' ),
								'choices'   => array(
									'inherit' => __( 'Inherit', 'kemet' ),
									'normal'  => __( 'Normal', 'kemet' ),
									'italic'  => __( 'Italic', 'kemet' ),
									'oblique' => __( 'Oblique', 'kemet' ),
								),
								'preview'   => array(
									'selector' => $btn_selector,
									'property' => '--fontStyle',
								),
							),
							'buttons-line-height'    => array(
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'transport'    => 'postMessage',
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
								'preview'      => array(
									'selector'   => $btn_selector,
									'property'   => '--lineHeight',
									'responsive' => true,
								),
							),
							'kmt-buttons-typography'     => array(
							'type'     => 'kmt-typography',
							'label'    => __( 'Buttons Typography22', 'kemet' ),
							'transport' => 'postMessage',
            				),
							
							'buttons-letter-spacing' => array(
								'transport'    => 'postMessage',
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'label'        => __( 'Letter Spacing', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0.1,
										'step' => 0.1,
										'max'  => 10,
									),
								),
								'preview'      => array(
									'selector'   => $btn_selector,
									'property'   => '--letterSpacing',
									'responsive' => true,
								),
							),
							'kmt-buttons-typography'     => array(
							'type'     => 'kmt-typography',
							'label'    => __( 'Buttons Typography 22', 'kemet' ),
							'transport' => 'postMessage',
            				),
							'button-text-color'      => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Text Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Text', 'kemet' ),
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
							'button-bg-color'        => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Background Color', 'kemet' ),
								'section'   => 'section-buttons-fields',
								'pickers'   => array(
									array(
										'title' => __( 'Text', 'kemet' ),
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
							'btn-border-color'       => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Border Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Text', 'kemet' ),
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
							'button-radius'          => array(
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
							'btn-border-size'        => array(
								'type'         => 'kmt-slider',
								'transport'    => 'postMessage',
								'label'        => __( 'Border Size', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 10,
									),
								),
								'preview'      => array(
									'selector' => $btn_selector,
									'property' => '--borderWidth',
								),
							),
						),
					),
				),
			),
			'kmt-input-color' => array(
				'type'  => 'kmt-title',
				'label' => __( 'Input Fields Style', 'kemet' ),
			),
			'input-tabs'      => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							'input-spacing' => array(
								'type'           => 'kmt-spacing',
								'transport'      => 'postMessage',
								'responsive'     => true,
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
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							'inputs-font-size'      => array(
								'transport'    => 'postMessage',
								'type'         => 'kmt-slider',
								'responsive'   => true,
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
								'preview'      => array(
									'selector'   => $input_selector,
									'property'   => '--fontSize',
									'responsive' => true,
								),
							),
							// 'inputs-font-family'       => array(
							// 'type'     => 'kmt-font-family',
							// 'label'    => __( 'Font Family', 'kemet' ),
							// 'section'  => 'section-buttons-fields',
							// 'priority' => 95,
							// 'connect'  => KEMET_THEME_SETTINGS . '[inputs-font-weight]',
							// ),
							// 'inputs-font-weight'       => array(
							// 'type'     => 'kmt-font-weight',
							// 'label'    => __( 'Font Weight', 'kemet' ),
							// 'section'  => 'section-buttons-fields',
							// 'priority' => 100,
							// 'connect'  => KEMET_THEME_SETTINGS . '[inputs-font-family]',
							// ),
							'inputs-text-transform' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-select',
								'label'     => __( 'Text Transform', 'kemet' ),
								'choices'   => array(
									''           => __( 'Default', 'kemet' ),
									'none'       => __( 'None', 'kemet' ),
									'capitalize' => __( 'Capitalize', 'kemet' ),
									'uppercase'  => __( 'Uppercase', 'kemet' ),
									'lowercase'  => __( 'Lowercase', 'kemet' ),
								),
								'preview'   => array(
									'selector' => $input_selector,
									'property' => '--textTransform',
								),
							),
							'inputs-font-style'     => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-select',
								'label'     => __( 'Font Style', 'kemet' ),
								'choices'   => array(
									'inherit' => __( 'Inherit', 'kemet' ),
									'normal'  => __( 'Normal', 'kemet' ),
									'italic'  => __( 'Italic', 'kemet' ),
									'oblique' => __( 'Oblique', 'kemet' ),
								),
								'preview'   => array(
									'selector' => $input_selector,
									'property' => '--fontStyle',
								),
							),
							'inputs-line-height'    => array(
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'transport'    => 'postMessage',
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
								'preview'      => array(
									'selector'   => $input_selector,
									'property'   => '--lineHeight',
									'responsive' => true,
								),
							),
							'inputs-letter-spacing' => array(
								'transport'    => 'postMessage',
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'label'        => __( 'Letter Spacing', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0.1,
										'step' => 0.1,
										'max'  => 10,
									),
								),
								'preview'      => array(
									'selector'   => $input_selector,
									'property'   => '--letterSpacing',
									'responsive' => true,
								),
							),
							'input-text-color'      => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Text Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Text', 'kemet' ),
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
							'input-bg-color'        => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Background Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Text', 'kemet' ),
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
							'input-border-color'    => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Border Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Text', 'kemet' ),
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
							'input-label-color'     => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Label Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Text', 'kemet' ),
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
							'input-radius'          => array(
								'type'         => 'kmt-slider',
								'responsive'   => true,
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
							'input-border-size'     => array(
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
