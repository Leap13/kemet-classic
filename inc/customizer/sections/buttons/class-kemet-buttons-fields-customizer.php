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

class Kemet_Buttons_Fields_Customizer extends Kemet_Customizer_Register
{

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options($options)
	{
		$btn_selector       = 'button, .button, .kmt-button, input[type=button], input[type=reset] ,input[type="submit"], .wp-block-button a.wp-block-button__link, .wp-block-search button.wp-block-search__button';
		$btn_hover_selector = 'button:focus, .button:hover, button:hover, .kmt-button:hover, .button:hover, input[type=reset]:hover, input[type=reset]:focus, input#submit:hover, input#submit:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="submit"]:hover, input[type="submit"]:focus, .button:focus, .button:focus, .wp-block-button a.wp-block-button__link:hover, .wp-block-search button.wp-block-search__button:hover';
		$register_options   = array(
			'kmt-buttons'              => array(
				'type'     => 'kmt-title',
				'label'    => __('Buttons Style', 'kemet'),
				'section'  => 'section-buttons-fields',
				'priority' => 1,
			),
			'buttons-font-size'        => array(
				'type'         => 'option',
				'transport'    => 'postMessage',
				'type'         => 'kmt-responsive-slider',
				'section'      => 'section-buttons-fields',
				'priority'     => 5,
				'label'        => __('Font Size', 'kemet'),
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
					'selector' => $btn_selector,
					'property' => '--fontSize',
				),
			),
			'buttons-font-family'      => array(
				'type'     => 'kmt-font-family',
				'label'    => __('Font Family', 'kemet'),
				'section'  => 'section-buttons-fields',
				'priority' => 10,
				'connect'  => KEMET_THEME_SETTINGS . '[buttons-font-weight]',
			),
			'buttons-font-weight'      => array(
				'type'     => 'kmt-font-weight',
				'label'    => __('Font Weight', 'kemet'),
				'section'  => 'section-buttons-fields',
				'priority' => 15,
				'connect'  => KEMET_THEME_SETTINGS . '[buttons-font-family]',
			),
			'buttons-text-transform'   => array(
				'transport' => 'postMessage',
				'type'      => 'select',
				'label'     => __('Text Transform', 'kemet'),
				'section'   => 'section-buttons-fields',
				'priority'  => 20,
				'choices'   => array(
					''           => __('Default', 'kemet'),
					'none'       => __('None', 'kemet'),
					'capitalize' => __('Capitalize', 'kemet'),
					'uppercase'  => __('Uppercase', 'kemet'),
					'lowercase'  => __('Lowercase', 'kemet'),
				),
				'preview'   => array(
					'selector' => $btn_selector,
					'property' => '--textTransform',
				),
			),
			'buttons-font-style'       => array(
				'transport' => 'postMessage',
				'type'      => 'select',
				'label'     => __('Font Style', 'kemet'),
				'section'   => 'section-buttons-fields',
				'priority'  => 25,
				'choices'   => array(
					'inherit' => __('Inherit', 'kemet'),
					'normal'  => __('Normal', 'kemet'),
					'italic'  => __('Italic', 'kemet'),
					'oblique' => __('Oblique', 'kemet'),
				),
				'preview'   => array(
					'selector' => $btn_selector,
					'property' => '--fontStyle',
				),
			),
			'buttons-line-height'      => array(
				'type'         => 'kmt-responsive-slider',
				'section'      => 'section-buttons-fields',
				'transport'    => 'postMessage',
				'priority'     => 30,
				'label'        => __('Line Height', 'kemet'),
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
					'selector' => $btn_selector,
					'property' => '--lineHeight',
				),
			),
			'buttons-letter-spacing'   => array(
				'transport'    => 'postMessage',
				'type'         => 'kmt-responsive-slider',
				'section'      => 'section-buttons-fields',
				'priority'     => 35,
				'label'        => __('Letter Spacing', 'kemet'),
				'unit_choices' => array(
					'px' => array(
						'min'  => 0.1,
						'step' => 0.1,
						'max'  => 10,
					),
				),
				'preview'      => array(
					'selector' => $btn_selector,
					'property' => '--letterSpacing',
				),
			),
			'button-color-group'       => array(
				'type'     => 'kmt-color',
				'responsive' => true,
				'default'  => array(
					'desktop' => array(
						'initial' => '#fff',
						'hover'   => '#000',
					),
					'tablet' => array(
						'initial' => '',
						'hover'   => '',
					),
					'mobile' => array(
						'initial' => '',
						'hover'   => '',
					)
				),
				'label' => 'Button Color',
				'section'  => 'section-buttons-fields',
				'priority' => 36,
				'pickers'  => array(
					array(
						'title' => __('Text', 'kemet'),
						'id'    => 'initial',
					),
					array(
						'title' => __('Hover', 'kemet'),
						'id'    => 'hover',
					),

				),

			),
			'button-color'             => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'label'     => __('Text Color', 'kemet'),
				'priority'  => 40,
				'section'   => 'section-buttons-fields',
				'preview'   => array(
					array(
						'selector' => $btn_selector,
						'property' => '--buttonColor',
					),
					array(
						'selector' => $btn_hover_selector,
						'property' => '--buttonHoverColor',
					),
				),
				'input_attrs'  => array(),
			),
			'body-bg-obj'     => array(
                'transport' => 'postMessage',
                'type'      => 'kmt-background',
                'label'     => __( 'Background', 'kemet' ),
                'priority'  => 142,
				'responsive' => true,
                'section'   => 'section-buttons-fields',
            ),
			// 'button-bg-color'          => array(
			// 	'type'      => 'kmt-color',
			// 	'transport' => 'postMessage',
			// 	'label'     => __('Background Color', 'kemet'),
			// 	'priority'  => 45,
			// 	'section'   => 'section-buttons-fields',
			// 	'preview'   => array(
			// 		'selector' => $btn_selector,
			// 		'property' => '--buttonBackgroundColor',
			// 	),
			// ),
			'btn-border-color'         => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __('Border Color', 'kemet'),
				'priority'  => 50,
				'section'   => 'section-buttons-fields',
				'preview'   => array(
					'selector' => $btn_selector,
					'property' => '--borderColor',
				),
			),

			'button-bg-h-color'        => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'label'     => __('Background Color', 'kemet'),
				'priority'  => 60,
				'section'   => 'section-buttons-fields',
				'preview'   => array(
					'selector' => $btn_hover_selector,
					'property' => '--buttonBackgroundHoverColor',
				),
			),
			'btn-border-h-color'       => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __('Border Color', 'kemet'),
				'priority'  => 65,
				'section'   => 'section-buttons-fields',
				'preview'   => array(
					'selector' => $btn_hover_selector,
					'property' => '--borderHoverColor',
				),
			),
			'button-radius'            => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-buttons-fields',
				'priority'     => 70,
				'label'        => __('Border Radius', 'kemet'),
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
					'selector' => $btn_selector,
					'property' => '--borderRadius',
				),
			),
			'btn-border-size'          => array(
				'type'        => 'kmt-slider',
				'transport'   => 'postMessage',
				'section'     => 'section-buttons-fields',
				'priority'    => 75,
				'label'       => __('Border Size', 'kemet'),
				'input_attrs' => array(
					'min'  => 0,
					'step' => 1,
					'max'  => 10,
				),
				'preview'     => array(
					'selector' => $btn_selector,
					'property' => '--borderWidth',
					'unit'     => 'px',
				),
			),
			'button-spacing'           => array(
				'type'           => 'kmt-responsive-spacing',
				'transport'      => 'postMessage',
				'section'        => 'section-buttons-fields',
				'priority'       => 80,
				'label'          => __('Padding', 'kemet'),
				'linked_choices' => true,
				'unit_choices'   => array('px', 'em', '%'),
				'choices'        => array(
					'top'    => __('Top', 'kemet'),
					'right'  => __('Right', 'kemet'),
					'bottom' => __('Bottom', 'kemet'),
					'left'   => __('Left', 'kemet'),
				),
				'preview'        => array(
					'selector' => $btn_selector,
					'property' => '--padding',
					'sides'    => false,
				),
			),
			'kmt-input-color'          => array(
				'type'     => 'kmt-title',
				'label'    => __('Input Fields Style', 'kemet'),
				'section'  => 'section-buttons-fields',
				'priority' => 85,
			),
			'inputs-font-size'         => array(
				'transport'    => 'postMessage',
				'type'         => 'kmt-responsive-slider',
				'section'      => 'section-buttons-fields',
				'priority'     => 90,
				'label'        => __('Font Size', 'kemet'),
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
			'inputs-font-family'       => array(
				'type'     => 'kmt-font-family',
				'label'    => __('Font Family', 'kemet'),
				'section'  => 'section-buttons-fields',
				'priority' => 95,
				'connect'  => KEMET_THEME_SETTINGS . '[inputs-font-weight]',
			),
			'inputs-font-weight'       => array(
				'type'     => 'kmt-font-weight',
				'label'    => __('Font Weight', 'kemet'),
				'section'  => 'section-buttons-fields',
				'priority' => 100,
				'connect'  => KEMET_THEME_SETTINGS . '[inputs-font-family]',
			),
			'inputs-text-transform'    => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-select',
				'label'     => __('Text Transform', 'kemet'),
				'section'   => 'section-buttons-fields',
				'priority'  => 105,
				'choices'   => array(
					''           => __('Default', 'kemet'),
					'none'       => __('None', 'kemet'),
					'capitalize' => __('Capitalize', 'kemet'),
					'uppercase'  => __('Uppercase', 'kemet'),
					'lowercase'  => __('Lowercase', 'kemet'),
				),
			),
			'inputs-font-style'        => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-select',
				'label'     => __('Font Style', 'kemet'),
				'section'   => 'section-buttons-fields',
				'priority'  => 115,
				'choices'   => array(
					'inherit' => __('Inherit', 'kemet'),
					'normal'  => __('Normal', 'kemet'),
					'italic'  => __('Italic', 'kemet'),
					'oblique' => __('Oblique', 'kemet'),
				),
			),
			'inputs-line-height'       => array(
				'type'         => 'kmt-responsive-slider',
				'section'      => 'section-buttons-fields',
				'transport'    => 'postMessage',
				'priority'     => 120,
				'label'        => __('Line Height', 'kemet'),
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
			'inputs-letter-spacing'    => array(
				'transport'    => 'postMessage',
				'type'         => 'kmt-responsive-slider',
				'section'      => 'section-buttons-fields',
				'priority'     => 125,
				'label'        => __('Letter Spacing', 'kemet'),
				'unit_choices' => array(
					'px' => array(
						'min'  => 0.1,
						'step' => 0.1,
						'max'  => 10,
					),
				),
			),
			'input-text-color'         => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __('Text Color', 'kemet'),
				'priority'  => 130,
				'section'   => 'section-buttons-fields',
			),
			'input-bg-color'           => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __('Background Color', 'kemet'),
				'priority'  => 135,
				'section'   => 'section-buttons-fields',
			),
			'input-border-color'       => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __('Border Color', 'kemet'),
				'priority'  => 140,
				'section'   => 'section-buttons-fields',
			),
			'input-focus-text-color'   => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __('Focus Text Color', 'kemet'),
				'priority'  => 141,
				'section'   => 'section-buttons-fields',
			),
			'input-focus-bg-color'     => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __('Focus Background Color', 'kemet'),
				'priority'  => 142,
				'section'   => 'section-buttons-fields',
			),
			'input-focus-border-color' => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __('Focus Border Color', 'kemet'),
				'priority'  => 143,
				'section'   => 'section-buttons-fields',
			),
			'input-label-color'        => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __('Label Color', 'kemet'),
				'priority'  => 145,
				'section'   => 'section-buttons-fields',
			),
			'input-radius'             => array(
				'type'         => 'kmt-responsive-slider',
				'section'      => 'section-buttons-fields',
				'priority'     => 150,
				'label'        => __('Border Radius', 'kemet'),
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
			),
			'input-border-size'        => array(
				'type'         => 'kmt-responsive-slider',
				'section'      => 'section-buttons-fields',
				'priority'     => 155,
				'label'        => __('Border Size', 'kemet'),
				'unit_choices' => array(
					'px' => array(
						'min'  => 0,
						'step' => 1,
						'max'  => 100,
					),
				),
			),
			'input-spacing'            => array(
				'type'           => 'kmt-responsive-spacing',
				'section'        => 'section-buttons-fields',
				'priority'       => 160,
				'label'          => __('Padding', 'kemet'),
				'linked_choices' => true,
				'unit_choices'   => array('px', 'em', '%'),
				'choices'        => array(
					'top'    => __('Top', 'kemet'),
					'right'  => __('Right', 'kemet'),
					'bottom' => __('Bottom', 'kemet'),
					'left'   => __('Left', 'kemet'),
				),
			),
		);
		return array_merge($options, $register_options);
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections($sections)
	{
		$register_sections = array(
			'section-buttons-fields' => array(
				'priority' => 50,
				'title'    => __('Buttons & Fields', 'kemet'),
			),
		);

		return array_merge($sections, $register_sections);
	}
}

new Kemet_Buttons_Fields_Customizer();
